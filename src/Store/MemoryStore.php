<?php

namespace Wipkip\NeTEx\Store;

use Wipkip\NeTEx\Helpers\Arr;
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

}