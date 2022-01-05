<?php

namespace Wipkip\NeTEx\Reflection;

use GoetasWebservices\XML\XSDReader\Schema\Attribute\Attribute;
use GoetasWebservices\XML\XSDReader\Schema\Element\Element;
use GoetasWebservices\XML\XSDReader\Schema\Element\ElementContainer;
use GoetasWebservices\XML\XSDReader\Schema\Type\SimpleType;
use GoetasWebservices\XML\XSDReader\Schema\Type\Type;
use GoetasWebservices\XML\XSDReader\SchemaReader;
use Wipkip\NeTEx\Helpers\Arr;


class Schema
{

    const CustomTypes = [
        'Block' => [
            'journeys' => 'DeadRun|ServiceJourney[]',
        ],
        'DeadRun' => [
            'validityConditions' => 'AvailabilityCondition[]',
        ]
    ];




    /**
     * @var \GoetasWebservices\XML\XSDReader\Schema\Schema
     */
    public $schema;
    /**
     * @var array|string|string[]
     */
    private $xsdName;

    public function __construct(string $xsdPath)
    {
        $reader = new SchemaReader();
        $this->schema = $reader->readFile($xsdPath);

        // Name the schema
        $this->xsdName = pathinfo($xsdPath, PATHINFO_BASENAME);

    }

    public function generateModelClasses(string $outputPath)
    {

        // Get Frame types
        $frameTypes = array_filter($this->schema->getTypes(), function($type) {
            return preg_match('/^(Resource|Infrastructure|Service|Timetable|ServiceCalendar|VehicleSchedule)Frame$/i', $type->getName());
        });
        foreach ($frameTypes as $type) {

            // Get elements
            /** @var Element[] $elements */
            $elements = $type->getElements();
            foreach ($elements as $element) {

                // Skip type of frame
                $name = $element->getName();
                if ($name == 'TypeOfFrameRef') continue;

                // Now we have the list-element of the element we're looking for, so dive in 1 level deeper
                /** @var Element[] $subElements */
                $t = $element->getType();
                if ($t instanceof SimpleType) continue;
                $subElements = $element->getType()->getElements();
                foreach ($subElements as $el) {

                    // Now generate model
                    $this->generateModelClass($el, $outputPath);

                }
            }

        }

        // Also get the enums
        $enumTypes = array_filter($this->schema->getTypes(), function($type) {
             return preg_match('/Enumeration$/', $type->getName());
        });
        foreach ($enumTypes as $enumType) {

            // Save it.
            $this->generateEnumClass($enumType, $outputPath);

        }

    }

    private function generateModelClass(Element $el, string $outputPath)
    {

        // Model basics
        $name = $el->getName();
        $path = $outputPath . '/' . $name . '.php';

        // Already there? Then it's done by a previous type
        if (file_exists($path)) return;

        // Start it up
        $doc = <<<EOF
<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * $name model class 
 * 
 * This class was automatically generated based on the XSD '$this->xsdName'
 *

EOF;

        // Get the props
        $props = array_merge(
            $el->getType()->getElements(),
            $el->getType()->getAttributes()
        );
        foreach ($props as $prop) {

            // Get prop.
            $doc .= $this->getPropertyDoc($prop, $el, $outputPath);


        }



        // Finish doc, and add class
        $doc .= <<<EOF
 */
 
class $name extends Record {}
EOF;


        // Write it
        file_put_contents($path, $doc);

    }

    /**
     * @param $prop
     * @param Element|Attribute $el
     * @param string $outputPath
     * @return string
     */
    private function getPropertyDoc($prop, Element $el, string $outputPath)
    {

        $result = 'mixed';
        $name = $prop->getName();
        if ($prop instanceof Element) {

            // Get the type
            $type = $prop->getType();
            if ($type instanceof SimpleType) {
                $result = $this->mapSimpleType($type);
            } else {

                // Just a complicated string?
                $ext = $type->getExtension();
                if (
                    ($ext && $ext->getBase()->getName() == 'normalizedString')
                    || preg_match('/^LocationStructure$/', $type->getName())
                ) {
                    $result = 'string';
                }



                // A ref of sorts?
                elseif (preg_match('/ObjectRefStructure|TypeOfFrameRefStructure/', $type->getName())) {

                    // Can we guess the ref-type based on the name?
                    $n = preg_replace('/Ref$/', '', $prop->getName());
                    $t = $this->schema->getType(lcfirst($n));
                    $multiple = false;
                    if (!$t) {
                        $singular = lcfirst(preg_replace('/s$/', '', $n));
                        $multiple = true;
                        if ($singular != $n) $t = $this->schema->getType($singular);
                    }

                    if ($t && $this->isOfModelType($t)) {

                        // Then let's use that.
                        $result = $n . ($multiple ? '[]' : '');

                    } else {
                        // A reference object. We can't retrieve the type of the reference from the object unfortunately
                        $result = 'mixed';
                    }

                    // No refs in the naming either way
                    $name = preg_replace('/Ref$/', '', $name);
                }

                // More complicated stuff...
                else {

                    // Are there sub-elements that are data-stuctures (i.e. models) themselves?
                    $subElements = $type->getElements();
                    $subTypes = array_filter(array_map(function($el) use ($outputPath, $prop) {

                        // Not an element?
                        if (!($el instanceof Element)) {
                            dd($el->getName(), $prop->getName());
                        }

                        // Record?
                        if (!$this->isOfModelType($el)) return false;

                        // Map it.
                        $this->generateModelClass($el, $outputPath);
                        return $el->getName();

                    }, $subElements));
                    if (count($subTypes) > 0) {

                        // Use those
                        $result = implode('|', $subTypes) . '[]';

                    } else {

                        echo ('Unable to figure out: ' . $el->getName() . '::' . $prop->getName() .  '(type ' . $type->getName() . ')') .PHP_EOL;
                        $result = 'mixed';

                    }

                }

            }

            // Optional?
            if ($prop->getMin() < 1) $result .= '|null';

            // Array?
            if ($prop->getMax() > 1) $result .= "[]";

        } elseif ($prop instanceof Attribute) {

            $result = 'string';
            if ($prop->getUse() == Attribute::USE_OPTIONAL) $result . '|null';

        }

        // Fix the name.
        $name = lcfirst($name);
        $name = preg_replace('/Ref(_ref)?$/', '', $name);

        // Custom one?
        $customType = Arr::get(self::CustomTypes, $el->getName() . ':' . $name);
        if ($customType) {
            $result = $customType;
            if ($prop->getMin() < 1) $result .= '|null';
        }

        // Annotation?
        $doc = $prop->getDoc();
        $line = " * @property-read  $result  \$$name  $doc\n";

        // Attributes on it too?
        if ($prop instanceof Element) {
            $t = $prop->getType();
            if (!($t instanceof SimpleType)) {

                $attrs = $prop->getType()->getAttributes();
                foreach ($attrs as $attr) {
                    if (preg_match('/^ref|version$/', $attr->getName())) continue;
                    $attrName = $name . '_' . $attr->getName();
                    $type = ($attr->getUse() == Attribute::USE_OPTIONAL) ? 'string|null' : 'string';
                    $line .= " * @property-read  $type  \$$attrName\n";
                }

            }
        }

        return $line;

    }

    private function mapSimpleType(SimpleType $type)
    {
//        // Go down to the base type
//        $base = $type;
//        while (true) {
//            dump($base->getName());
//            $sub = $base->getRestriction();
//            if (!$sub) break;
//            $sub = $sub->getBase();
//
//            // We went too deep?
//            if ($sub->getName() == 'anySimpleType') break;
//            $base = $sub;
//        }
//
//        switch ($base->getName()) {
//            case 'string':
//                return 'string';
//
//            default:
//                throw new \Exception('Unknown simple type: ' . $type->getName() . ' (' . $base->getName() . ')');
//
//        }

        return 'string';

    }

    /**
     * @param Element|Type $el
     * @return bool
     */
    private function isOfModelType($el)
    {
        $ext = ($el instanceof Element ? $el->getType() : $el)->getExtension();
        if (!$ext) return false;
        return $ext->getBase()->getName() == 'DataManagedObjectStructure';
    }

    private function generateEnumClass(\GoetasWebservices\XML\XSDReader\Schema\Type\Type $type, string $outputPath)
    {

        // Get values
        $r = $type->getRestriction();
        $checks = $r->getChecks();
        if (!array_key_exists('enumeration', $checks)) return;
        $options = array_map(function ($o) {
            return $o['value'];
        }, $checks['enumeration']);


        // Start it up
        $name = $type->getName();
        $doc = <<<EOF
<?php
namespace Wipkip\NeTEx\Models\Enums;

/**
 * $name 
 * 
 * This class was automatically generated based on the XSD '$this->xsdName'
 */

class $name {

EOF;

        // Add options
        foreach ($options as $option) $doc .= "\tconst $option = '$option';\n";
        $doc .= "}\n";

        // Let's write it
        $path = $outputPath . '/Enums/' . $name . '.php';
        file_put_contents($path, $doc);

    }

}