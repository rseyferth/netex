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

    public function __construct($memoryLimit = 2048) {

        ini_set('memory_limit', $memoryLimit . 'M');

        $this->records = [];
    }

    function store(Record $rec, string $version = 'any')
    {
        // Create key
        $parts = explode(':', $rec->getId());
        $key = "$version.$parts[0].$parts[1]." . implode(':', array_slice($parts, 2));

        Arr::set($this->records, $key, $rec);
    }

    function get(string $id, string $version = 'any', bool $resolveReferences = true): ?Record
    {

        // Convert first to parts to dots.
        $key = $version . '.' . preg_replace('/:/', '.', $id, 2);

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

            // Get operators in this version (should be only 1)
            $operators = array_keys($this->records[$key]);
            if (count($operators) != 1) throw new NeTExException('Found ' . count($operators) . ' operators in a single version: ' . implode(', ', $operators) . '. Only 1 is allowed.');

            return new Version($key, $this, $operators[0]);

        }, array_keys($this->records));

    }

    function getResource(string $version, string $operator, string $resource, bool $resolveReferences = false): ?array
    {
        // Get the records
        /** @var Record[] $records */
        $key = implode('.', [$version, $operator, $resource]);
        $records = Arr::get($this->records, $key);
        if ($records) $records = array_values($records);
        if (!$records || !$resolveReferences) return $records;

        // Get the records enriched.
        return array_map(function($rec) {
            return $rec->resolveReferences($this);
        }, $records);

    }
}