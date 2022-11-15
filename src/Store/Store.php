<?php

namespace Wipkip\NeTEx\Store;

use Illuminate\Support\Collection;
use Wipkip\NeTEx\Parser\Record;
use Wipkip\NeTEx\Parser\Reference;

abstract class Store
{

    public $publicationTimestamp;


    abstract function store(Record $rec, string $version = 'any');

    /**
     * @param string $id
     * @param bool $resolveReferences
     * @return Record|null|Reference
     */
    abstract function get(string $id, string $version = 'any', bool $resolveReferences = true): ?Record;
    abstract function count() : int;



    /**
     * @return Collection|Version[]
     */
    abstract function getVersions(): Collection;

    abstract function getResource(string $version, string $resource, bool $resolveReferences = false): ?Collection;



    abstract function destroy(): void;





}