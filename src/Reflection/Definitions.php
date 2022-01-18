<?php

namespace Wipkip\NeTEx\Reflection;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Definitions
{

    /**
     * @var \PhpOffice\PhpSpreadsheet\Spreadsheet
     */
    private $excel;

    /**
     * @var Collection
     */
    private $models;

    public function __construct(string $xlsxPath)
    {
        $this->models = new Collection();
        $reader = new Xlsx();
        $this->excel = $reader->load($xlsxPath);
    }

    public function generateModelClasses(string $outputPath) {

        // Go through sheets
        $sheets = $this->excel->getAllSheets();
        $names = $this->excel->getSheetNames();
        foreach ($sheets as $index => $sheet) {

            // Elements sheet?
            if (preg_match('/elementen/', $names[$index])) {
                $this->parseElements($sheet, $outputPath);
            }
        }

        // Go through main models, and store them
        $keys = $this->models->keys()->filter(function($key) {
            return !Str::contains($key, "/");
        });
        foreach ($keys as $key) $this->writeModel($key, $outputPath);

    }

    private function parseElements(Worksheet $sheet, string $outputPath)
    {

        $cells = $sheet->getCellCollection();
        $rowCount = $cells->getHighestRow();

        for ($r = 1; $r <= $rowCount; $r++) {

            // Get A*
            $cell = $cells->get("A$r");
            if (!$cell) continue;

            // A model header?
            $style = $cell->getStyle();
            if ($this->styleIsModelHeader($style)) {

                // Let's create the model\
                $modelName = head(explode(' ', $cell->getValue()));
                $r = $this->parseModel($sheet, $modelName, $r, $outputPath);

            }

        }




    }

    private function parseModel(Worksheet $sheet, string $modelName, int $startRow, string $outputPath): int
    {
        $modelDescription = [];

        // Continue rows
        $row = $startRow + 1;
        $cell = $sheet->getCell('A' . $row);
        $A = $cell->getValue();

        $emptyRowsFound = 0;
        $subModelPath = null;

        $props = [];
        $style = null;
        while (true) {

            // ::> (start of definitions)
            if (empty($A)) {
                $emptyRowsFound++;
                if ($emptyRowsFound > 3) break;
            } else {
                $emptyRowsFound = 0;
            }

            if ($A == '::>') {

            } elseif (!empty($A)) {

                // Crossed?
                $font = $style ? $style->getFont() : null;
                if (optional($font)->getItalic()) {

                    // Add to description
                    if (strtolower($A) != 'name') $modelDescription[] = (string)$A;

                } elseif (!optional($font)->getStrikethrough()) {

                    // Get details
                    $propName = preg_replace('/Ref$/', '', $A);
                    $type = $sheet->getCell("B$row")->getValue();
                    $cardinality = $sheet->getCell("C$row")->getValue();
                    $isNullable = $cardinality == '0:1';

                    if (!empty($type)) {

                        // Add base prop
                        $props[] = [
                            'name' => $propName,
                            'type' => $type,
                            'isNullable' => $isNullable,
                            'description' => (string)$sheet->getCell("E$row")->getValue(),
                            'cardinality' => $cardinality
                        ];

                    }

                }

            }

            // Next.
            $row++;
            $cell = $sheet->getCell('A' . $row);
            $A = (string)$cell->getValue();
            $style = $cell->getStyle();

            // A new model?
            if ($this->styleIsModelHeader($style)) {

                // Move on to the next model then.
                if ($A == 'Name') continue;
                $row -= 1;
                break;



            }

        }

        // Store 'em
        if (!empty($props) && !$this->models->has($modelName)) {
            $this->models->put($modelName, ['props' => $props, 'description' => $modelDescription ]);
        }

        return $row;



    }


    private $pathAliases = [
        'Branding/Presentation' => 'TypeOfValue/Presentation',
        'TypeOfProductCategory/Presentation' => 'TypeOfValue/Presentation',

        'DestinationDisplay/variants/DestinationDisplayVariant/vias/Via' => 'DestinationDisplay/vias/Via',

        'TimingPoint/projections/PointProjection' => 'ScheduledStopPoint/projections/PointProjection',
        'DeadRunJourneyPattern/pointsInSequence' => 'ServiceJourneyPattern/pointsInSequence',

        'Block/dayTypes' => 'DeadRun/dayTypes',
        'ValueSet/values/TypeOfValue' => 'TypeOfValue',

        'Vehicle/Operator' => 'Operator',
        'Vehicle/VehicleType' => 'VehicleType',

        'Line/TransportSubmode' => 'OperationalContext/TransportSubmode'



    ];

    private function mapType(?string $str, array $prop, string $modelName, string $outputPath)
    {

        // A Ref?
        if (preg_match('/Ref$/', $str)) return preg_replace('/Ref$/', '', $str);

        // Poorly documented aliases?
        $path = $modelName . '/' . $prop['name'];
        if (array_key_exists($path, $this->pathAliases)) $path = $this->pathAliases[$path];

        // Is this defined as a model?
        if ($this->models->has($path)) {

            // Is it a type with just one prop and a lowercase name? Like 'ResponsibilitySet/roles'
            $name = last(explode('/', $path));
            $sub = $this->models->get($path);
            $subProps = $sub['props'];
            if (preg_match('/^[a-z]/', $name)) {

                // Use type of first prop
                $isArray = preg_match('/:\*$/', $subProps[0]['cardinality']);
                return $this->mapType($subProps[0]['type'], $sub['props'][0], $path, $outputPath) . ($isArray ? '[]|\\Illuminate\\Support\\Collection' : '');

            } else {

                // Write the model
                $this->writeModel($path, $outputPath);

                // Just use the type.
                return $name;

            }
        }

        // An enum
        if (preg_match('/Enum(eration)?$/', $str)) return 'string';


        // Basics
        switch ($str) {

            case 'MultilingualString':
            case 'MultiLingualString':
            case 'EmailAddressType':
            case 'DataSourceIdType':
            case 'VersionIdType':
            case 'PhoneType':
            case 'ColourValueType':
            case 'PrivateCode':
            case 'xsd:anyURI':
            case 'xsd:normalizedString':
            case 'xsd:duration':
            case 'xsd:gMonthDay':
            case 'xsd:date':
            case 'xsd:dateTime':
            case 'xsd:time':
            case 'bitString':
            case 'Key':
            case 'Value':
            case 'gml:DirectPositionType':
            case 'gml:LineStringType':
            case 'PointProjectionIdType':
            case 'DynamicAdvertisement':
            case 'DeadRunType':
            case 'CodespaceIdType':
                return 'string';

            case 'xsd:nonNegativeInteger':
            case 'xsd:integer':
            case 'DayOffsetType':
                return 'int';

            case 'xsd:boolean':
                return 'bool';

            case 'LengthType':
            case 'WeightType':
                return 'float';

            // Unknown
            case 'ValidityCondition':
                return 'mixed';

            default:
                throw new \Exception("Unknown type '$str'  for prop $path");


        }

    }

    private function styleIsModelHeader(\PhpOffice\PhpSpreadsheet\Style\Style $style)
    {
        $bg = $style->getFill()->getStartColor()->getRGB();
        return in_array(optional($style)->getFont()->getSize(), [12,14]) && $bg != 'FFFFFF';
    }

    private function writeModel(string $modelName, string $outputPath)
    {

        // Already there? Then it's done by a previous type
        $path = $outputPath . '/' . last(explode('/', $modelName)) . '.php';
        if (file_exists($path)) return;

        // Get details
        $modelDescription = $this->models->get($modelName)['description'];
        $props = $this->models->get($modelName)['props'];
        $modelBaseName = last(explode('/', $modelName));

        // Start it up
        $modelDescription = ' * ' . implode(PHP_EOL . ' * ', $modelDescription);
        $doc = <<<EOF
<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * $modelName model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
$modelDescription
 *

EOF;

        // Add property
        foreach ($props as $prop) {
            $type = $this->mapType($prop['type'], $prop, $modelName, $outputPath) . ($prop['isNullable'] ? '|null' : '');
            $doc .= ' * @property ' . $type . ' $' . Str::camel($prop['name']) . ' ' . $prop['description'] . PHP_EOL;
        }



        // Finish doc, and add class
        $doc .= <<<EOF
 */

class $modelBaseName extends Record {}
EOF;

        // Write it
        file_put_contents($path, $doc);


    }

}