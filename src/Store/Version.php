<?php

namespace Wipkip\NeTEx\Store;

use Illuminate\Support\Collection;
use Wipkip\NeTEx\Models\AvailabilityCondition;
use Wipkip\NeTEx\Models\Block;
use Wipkip\NeTEx\Models\DataSource;
use Wipkip\NeTEx\Models\DayType;
use Wipkip\NeTEx\Models\DayTypeAssignment;
use Wipkip\NeTEx\Models\DeadRun;
use Wipkip\NeTEx\Models\DestinationDisplay;
use Wipkip\NeTEx\Models\Line;
use Wipkip\NeTEx\Models\OperationalContext;
use Wipkip\NeTEx\Models\Operator;
use Wipkip\NeTEx\Models\PassengerStopAssignment;
use Wipkip\NeTEx\Models\ResponsibilitySet;
use Wipkip\NeTEx\Models\Route;
use Wipkip\NeTEx\Models\RouteLink;
use Wipkip\NeTEx\Models\RoutePoint;
use Wipkip\NeTEx\Models\ScheduledStopPoint;
use Wipkip\NeTEx\Models\ServiceJourney;
use Wipkip\NeTEx\Models\ServiceJourneyPattern;
use Wipkip\NeTEx\Models\StopArea;
use Wipkip\NeTEx\Models\TimeDemandType;
use Wipkip\NeTEx\Models\TimingLink;
use Wipkip\NeTEx\Models\TransportAdministrativeZone;
use Wipkip\NeTEx\Models\VehicleType;
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

    public function __construct(string $version, Store $store)
    {
        // Localize
        $this->version = $version;
        $this->store = $store;

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
     * @return Collection[]|Record[]|null
     */
    public function getResource($name, bool $resolveReferences = false): ?Collection
    {
        return $this->store->getResource($this->version, $name, $resolveReferences);
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


    /////////////
    // Helpers //
    /////////////
    ///

    /**
     * @return Collection|DataSource[]
     */
    public function dataSources(bool $resolveReferences = false) : Collection {
        return $this->getResource('DataSource', $resolveReferences);
    }
    /**
     * @return Collection|ResponsibilitySet[]
     */
    public function responsibilitySets(bool $resolveReferences = false) : Collection {
        return $this->getResource('ResponsibilitySet', $resolveReferences);
    }
    /**
     * @return Collection|Operator[]
     */
    public function operators(bool $resolveReferences = false) : Collection {
        return $this->getResource('Operator', $resolveReferences);
    }
    /**
     * @return Collection|OperationalContext[]
     */
    public function operationalContexts(bool $resolveReferences = false) : Collection {
        return $this->getResource('OperationalContext', $resolveReferences);
    }
    /**
     * @return Collection|VehicleType[]
     */
    public function vehicleTypes(bool $resolveReferences = false) : Collection {
        return $this->getResource('VehicleType', $resolveReferences);
    }
    /**
     * @return Collection|TransportAdministrativeZone[]
     */
    public function transportAdministrativeZones(bool $resolveReferences = false) : Collection {
        return $this->getResource('TransportAdministrativeZone', $resolveReferences);
    }
    /**
     * @return Collection|RoutePoint[]
     */
    public function routePoints(bool $resolveReferences = false) : Collection {
        return $this->getResource('RoutePoint', $resolveReferences);
    }
    /**
     * @return Collection|RouteLink[]
     */
    public function routeLinks(bool $resolveReferences = false) : Collection {
        return $this->getResource('RouteLink', $resolveReferences);
    }
    /**
     * @return Collection|Route[]
     */
    public function routes(bool $resolveReferences = false) : Collection {
        return $this->getResource('Route', $resolveReferences);
    }
    /**
     * @return Collection|Line[]
     */
    public function lines(bool $resolveReferences = false) : Collection {
        return $this->getResource('Line', $resolveReferences);
    }
    /**
     * @return Collection|DestinationDisplay[]
     */
    public function destinationDisplays(bool $resolveReferences = false) : Collection {
        return $this->getResource('DestinationDisplay', $resolveReferences);
    }
    /**
     * @return Collection|ScheduledStopPoint[]
     */
    public function scheduledStopPoints(bool $resolveReferences = false) : Collection {
        return $this->getResource('ScheduledStopPoint', $resolveReferences);
    }
    /**
     * @return Collection|StopArea[]
     */
    public function stopAreas(bool $resolveReferences = false) : Collection {
        return $this->getResource('StopArea', $resolveReferences);
    }
    /**
     * @return Collection|PassengerStopAssignment[]
     */
    public function stopAssignments(bool $resolveReferences = false) : Collection {
        return $this->getResource('PassengerStopAssignment', $resolveReferences);
    }
    /**
     * @return Collection|TimingLink[]
     */
    public function timingLinks(bool $resolveReferences = false) : Collection {
        return $this->getResource('TimingLink', $resolveReferences);
    }
    /**
     * @return Collection|ServiceJourneyPattern[]
     */
    public function serviceJourneyPatterns(bool $resolveReferences = false) : Collection {
        return $this->getResource('ServiceJourneyPattern', $resolveReferences);
    }
    /**
     * @return Collection|TimeDemandType[]
     */
    public function timeDemandTypes(bool $resolveReferences = false) : Collection {
        return $this->getResource('TimeDemandType', $resolveReferences);
    }
    /**
     * @return Collection|AvailabilityCondition[]
     */
    public function availabilityConditions(bool $resolveReferences = false) : Collection {
        return $this->getResource('AvailabilityCondition', $resolveReferences);
    }
    /**
     * @return Collection|ServiceJourney[]
     */
    public function serviceJourneys(bool $resolveReferences = false) : Collection {
        return $this->getResource('ServiceJourney', $resolveReferences);
    }
    /**
     * @return Collection|DeadRun[]
     */
    public function deadRuns(bool $resolveReferences = false) : Collection {
        return $this->getResource('DeadRun', $resolveReferences);
    }
    /**
     * @return Collection|DayType[]
     */
    public function dayTypes(bool $resolveReferences = false) : Collection {
        return $this->getResource('DayType', $resolveReferences);
    }
    /**
     * @return Collection|DayTypeAssignment[]
     */
    public function dayTypeAssignments(bool $resolveReferences = false) : Collection {
        return $this->getResource('DayTypeAssignment', $resolveReferences);
    }
    /**
     * @return Collection|Block[]
     */
    public function blocks(bool $resolveReferences = false) : Collection {
        return $this->getResource('Block', $resolveReferences);
    }



}