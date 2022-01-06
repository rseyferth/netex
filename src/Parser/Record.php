<?php

namespace Wipkip\NeTEx\Parser;

use Wipkip\NeTEx\Store\Store;

class Record
{

    /**
     * @var string
     */
    public $elementName;


    /**
     * @var array
     */
    public $data;


    private $cursor;


    private $_isResolved = false;


    public function __construct(string $name, array $attrs) {
        $this->elementName = $name;
        $this->data = $attrs;

        $this->cursor = [];
    }

    public function __get(string $name) {
        return $this->data[$name];
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
        $dataKey = implode('_', array_map('lcfirst', $path));
        if (!empty($value) || empty($attrs)) $this->data[$dataKey] = $value;

        // Store attributes
        if (!empty($attrs)) {

            // The ref? (e.g. <AuthorityRef ref="..." version="..." />)\
            if (preg_match('/Ref$/', $dataKey) && array_key_exists('ref', $attrs)) {

                // Store ref
                $this->data[$dataKey] = new Reference($attrs['ref'], $attrs['version'] ?: $version);

            } else {

                // Store sub-values
                foreach ($attrs as $key => $value) {
                    $this->data[$dataKey . '_' . $key] = $value;
                }

            }
        }

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
                if ($value instanceof Reference) $key = $value->id;
            }
            return $value;
        }, is_array($value) ? $value : [$value]);

        return $isArray ? $result : $result[0];
    }

    /**
     * @param Store $store
     * @return static
     */
    public function resolveReferences(Store $store)
    {
        // Create a copy
        $copy = new self($this->elementName, []);
        foreach ($this->data as $key => $value) {

            // Reference or array of refs?
            if ($value instanceof Reference || (is_array($value) && count($value) > 0 && $value[0] instanceof Reference)) {

                // Replace key and store the resolved value(s)
                $key = preg_replace('/Ref(_ref)?$/', '', $key);
                $copy->data[$key] = $this->resolveReferenceObjects($value, $store);

            }

            // Nested record(s)?
            elseif ($value instanceof Record || (is_array($value) && count($value) > 0 && $value[0] instanceof Record)) {

                // Resolve them too
                $isArray = is_array($value);
                $result = array_map(function($rec) use ($store) {
                    return $rec->resolveReferences($store);
                }, is_array($value) ? $value : [$value]);

                $copy->data[$key] = $isArray ? $result : $result[0];

            }

            // Just a value
            else {
                $copy->data[$key] = $value;
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
        $this->data[$name] = [];
    }

    public function addRecord($name, Record $record, string $version = 'any')
    {

        // Is it just a ref?
        if (preg_match('/Ref$/', $record->elementName)
            && array_key_exists('ref', $record->data)
            ) {

            $this->data[$name][] = new Reference($record->data['ref'], $record->data['version'] ?: $version, $record->elementName);

        } else {
            $this->data[$name][] = $record;
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
        foreach ($this->data as $key => $value) {
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
        return $this->data['id'];
    }


    public function isResolved() {
        return $this->_isResolved;
    }


}