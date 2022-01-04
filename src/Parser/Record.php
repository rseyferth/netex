<?php

namespace Wipkip\NeTEx\Parser;

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


    public function __construct(string $name, array $attrs) {
        $this->elementName = $name;
        $this->data = $attrs;

        $this->cursor = [];
    }


    public function setValue(?string $value)
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
            if (preg_match('/Ref$/', $dataKey) && array_key_exists('ref', $attrs) && array_key_exists('version', $attrs)) {

                // Store ref
                $this->data[$dataKey] = new Reference($attrs['ref'], $attrs['version']);

            } else {

                // Store sub-values
                foreach ($attrs as $key => $value) {
                    $this->data[$dataKey . '_' . $key] = $value;
                }

            }
        }

    }

    ////////////////////
    // Public helpers //
    ////////////////////

    public function createSet($name)
    {
        $this->data[$name] = [];
    }

    public function addRecord($name, Record $record)
    {

        // Is it just a ref?
        if (preg_match('/Ref$/', $record->elementName)
            && array_key_exists('ref', $record->data)
            && array_key_exists('version', $record->data)) {

            $this->data[$name][] = new Reference($record->data['ref'], $record->data['version'], $record->elementName);

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

}