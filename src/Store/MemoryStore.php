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
        Arr::set($this->records, ($version ?: 'any') . ':' . $rec->getId(), $rec);
    }

    function get(string $id, string $version = 'any', bool $resolveReferences = true): ?Record
    {

        // Get record
        /**
         * @var ?Record $rec
         */
        $rec = Arr::get($this->records, $version . ':' . $id);
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

    function getResource(string $version, string $operator, string $resource): ?array
    {
        return Arr::get($this->records, implode(':', [$version, $operator, $resource]));
    }
}