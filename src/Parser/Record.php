<?php

namespace Wipkip\NeTEx\Parser;

use Illuminate\Support\Arr;
use stdClass;
use Wipkip\NeTEx\Store\Store;

class Record
{

    /**
     * @var string
     */
    public $elementName;


    private $cursor;


    private $_isResolved = false;



    /**
     * @param string $name
     * @param array|Record $attrs
     */
    public function __construct(string $name, $attrs) {
        $this->elementName = $name;
        foreach ($attrs as $key => $value) {
            $this->$key = $value;
        }

        $this->cursor = [];
    }

    public function __get(string $name) {
        return $this->$name ?? null;
    }


    public function setValue(?string $value, string $version = 'any')
    {

        // Get key from cursor
        $path = array_map(function($p) {
            return lcfirst($p[0]);
        }, $this->cursor);

        // Nothing given?
        if (empty($path) && empty($value)) return;
        $attrs = $this->cursor[count($this->cursor) - 1][1];

        // Store value using first group
        if (!empty($value) || empty($attrs)) $this->setPathValue($path, $value);

        // Store attributes
        if (!empty($attrs)) {

            // The ref? (e.g. <AuthorityRef ref="..." version="..." />)\
            if (preg_match('/Ref$/', last($path)) && array_key_exists('ref', $attrs)) {

                // Store ref
                $this->setPathValue($path, new Reference($attrs['ref'], Arr::get($attrs, 'version', $version)));

            } else {

                // Store sub-values
                $base = last($path);
                foreach ($attrs as $key => $value) {
                    array_pop($path);
                    $path[] = $base . '_' . $key;
                    $this->setPathValue($path, $value);
                }

            }
        }

    }

    private function setPathValue(array $path, $value) {

        // Fix path
        $path = array_map(function($p) {
            return preg_replace('/:/', '_' ,$p);
        }, $path);

        // Get the obj
        $obj = $this;
        while (count($path) > 1) {
            $key = array_shift($path);
            if (!isset($obj->$key) || is_null($obj->$key)) {
                $obj->$key = new stdClass();
            }
            $obj = $obj->$key;
        }

        // No object found?
        if (!is_object($obj)) {

            // Use underscores instead.
            $this->setPathValue([implode('_', $path)], $value);
            return;

        }

        // Set it
        $key = $path[0];



        // Not overwriting an object?
        if (is_null($value) && isset($obj->$key)) return;
        $obj->$key = $value;

    }


    private function resolveReferenceObjects($value, Store $store) {

        // Let's resolve them
        $isArray = is_array($value);
        $result = array_map(function($ref) use ($store) {

            // Retrieve the object reference (and keep going if we get another reference)
            $key = $ref->id;
            $value = $ref;
            while ($value instanceof Reference) {
                $value = $store->get($key, $value->version ?: 'any');
                if (!$value) $value = new InvalidReference($ref->id, $ref->version ?: 'any', $ref->elementName);
                if ($value instanceof Reference) $key = $value->id;
            }
            return $value;
        }, is_array($value) ? $value : [$value]);

        return $isArray ? collect($result) : $result[0];
    }

    /**
     * @param Store $store
     * @return static
     */
    public function resolveReferences(Store $store)
    {
        // Create a copy
        $copy = new static($this->elementName, []);
        foreach ($this as $key => $value) {

            // Reference or array of refs?
            if ($value instanceof Reference || (is_array($value) && count($value) > 0 && $value[0] instanceof Reference)) {

                // Replace key and store the resolved value(s)
                $key = preg_replace('/Ref(_ref)?$/', '', $key);
                $copy->$key = $this->resolveReferenceObjects($value, $store);

            }

            // Nested record(s)?
            elseif ($value instanceof Record || (is_array($value) && count($value) > 0 && $value[0] instanceof Record)) {

                // Resolve them too
                $isArray = is_array($value);
                $result = array_map(function($rec) use ($store) {
                    return $rec->resolveReferences($store);
                }, is_array($value) ? $value : [$value]);

                $copy->$key = $isArray ? collect($result) : $result[0];

            }

            // Just a value
            else {
                $copy->$key = $value;
            }

        }

        $copy->_isResolved = true;
        return $copy;


    }


    ////////////////////
    // Public helpers //
    ////////////////////

    public function createSet($name)
    {
        $this->$name = [];
    }

    public function addRecord($name, Record $record, string $version = 'any')
    {

        // Is it just a ref?
        if (preg_match('/Ref$/', $record->elementName)
            && isset($record->ref)
            ) {

            $this->$name[] = new Reference($record->ref, $record->version ?? $version, $record->elementName);

        } else {
            $this->$name[] = $record;
        }
    }

    public function popCursor()
    {
        array_pop($this->cursor);
    }

    public function pushCursor($value)
    {
        $this->cursor[] = $value;
    }

    public function dd()
    {
        dd('<' . $this->elementName . '>', $this->toArray());
    }

    public function toArray($includeElementName = false) {

        $result = [];
        if ($includeElementName) $result['$'] = $this->elementName;
        foreach ($this as $key => $value) {
            if (is_array($value)) {
                $arr = [];
                foreach ($value as $v) {
                    if ($v instanceof Record) {
                        $arr[] = $v->toArray(true);
                    } else {
                        $arr[] = $v;
                    }
                }
                $result[$key] = $arr;
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function getId() {
        return $this->id;
    }


    public function isResolved() {
        return $this->_isResolved;
    }


}