<?php

namespace Wipkip\NeTEx\Store;

use Wipkip\NeTEx\Helpers\Arr;
use Wipkip\NeTEx\NeTExException;
use Wipkip\NeTEx\Parser\Record;

/**
 * Stores all records in the memory (quickest method). This requires around 3.7x the size of the XML file in RAM.
 */
class MemoryStore extends Store
{


    /**
     * @var array
     */
    private $records;

    private $refs;


    public function __construct($memoryLimit = 2048) {

        ini_set('memory_limit', $memoryLimit . 'M');

        $this->records = [];
        $this->refs = [];
    }

    function store(Record $rec, string $version = 'any')
    {
        // Store the record nested for quick access: Version -> Element Type -> ID
        $id = $rec->getId();
        $key = implode('.', [$version, $rec->elementName, $rec->getId()]);
        Arr::set($this->records, $key, $rec);

        // Store the reference in the map
        Arr::set($this->refs, $version . '.' . $id, $key);


    }

    function get(string $id, string $version = 'any', bool $resolveReferences = true): ?Record
    {

        // Look it up
        $key = Arr::get($this->refs, "$version.$id");
        if (!$key) return null;

        // Get record
        /**
         * @var ?Record $rec
         */
        $rec = Arr::get($this->records, $key);
        if (!$rec || !$resolveReferences) return $rec;

        // Resolve it
        return $rec->resolveReferences($this);

    }


    function count(): int
    {
        $cnt = 0;
        array_walk_recursive($this->records, function() use (&$cnt){
            $cnt++;
        });
        return $cnt;
    }


    function getVersions(): array
    {
        // Version is the first key in the store
        return array_map(function($key) {
            return new Version($key, $this);

        }, array_keys($this->records));

    }

    function getResource(string $version, string $resource, bool $resolveReferences = false): ?array
    {
        // Get the records
        /** @var Record[] $records */
        $key = implode('.', [$version, $resource]);

        $records = Arr::get($this->records, $key);
        if ($records) $records = array_values($records);
        if (!$records || !$resolveReferences) return $records;

        // Get the records enriched.
        return array_map(function($rec) {
            return $rec->resolveReferences($this);
        }, $records);

    }
}