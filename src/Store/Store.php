<?php

namespace Wipkip\NeTEx\Store;

use Wipkip\NeTEx\Parser\Record;
use Wipkip\NeTEx\Parser\Reference;

abstract class Store
{

    abstract function store(Record $rec, string $version = 'any');

    /**
     * @param string $id
     * @param bool $resolveReferences
     * @return Record|null|Reference
     */
    abstract function get(string $id, string $version = 'any', bool $resolveReferences = true): ?Record;
    abstract function count() : int;



    /**
     * @return Version[]
     */
    abstract function getVersions(): array;

    abstract function getResource(string $version, string $resource): ?array;





}