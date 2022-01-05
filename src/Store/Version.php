<?php

namespace Wipkip\NeTEx\Store;

use Wipkip\NeTEx\NeTExException;
use Wipkip\NeTEx\Parser\Record;

class Version
{

    /**
     * @var string
     */
    public $version;
    /**
     * @var Store
     */
    private $store;


    public $startDate;
    public $endDate;
    public $versionType;

    /**
     * @var string
     */
    private $operator;

    public function __construct(string $version, Store $store, string $operator)
    {
        // Localize
        $this->version = $version;
        $this->store = $store;
        $this->operator = $operator;

        // Get details from Version record
        $rec = $this->findRecord('Version', ['version' => $this->version]);
        if (!$rec) throw new NeTExException('There was no Version element for version ' . $this->version);

        $this->startDate = substr($rec->startDate, 0, 10);
        $this->endDate = substr($rec->endDate, 0, 10);
        $this->versionType = $rec->versionType;

        // Not right?
        if ($this->versionType !== 'baseline') throw new NeTExException('Only "baseline" versions are supported in the current implementation. Given type: ' . $this->versionType);

    }


    /**
     * @param $name
     * @return Record[]|null
     */
    public function getResource($name): ?array
    {
        return $this->store->getResource($this->version, $this->operator, $name);
    }

    /**
     * @param $resourceName
     * @param array $where
     * @return Record|null
     */
    public function findRecord($resourceName, array $where): ?Record
    {
        $resource = $this->getResource($resourceName);
        foreach ($resource as $record) {
            foreach ($where as $key => $value) {
                if ($record->$key != $value) continue 2;
            }
            return $record;
        }
        return null;
    }

}