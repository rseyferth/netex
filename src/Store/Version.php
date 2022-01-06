<?php

namespace Wipkip\NeTEx\Store;

use Symfony\Component\VarDumper\Cloner\Data;
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
     * @return Record[]|null
     */
    public function getResource($name): ?array
    {
        return $this->store->getResource($this->version, $name);
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
     * @return DataSource[]
     */
    public function dataSources() : array {
        return $this->getResource('DataSource');
    }
    /**
     * @return ResponsibilitySet[]
     */
    public function responsibilitySets() : array {
        return $this->getResource('ResponsibilitySet');
    }
    /**
     * @return Operator[]
     */
    public function operators() : array {
        return $this->getResource('Operator');
    }
    /**
     * @return OperationalContext[]
     */
    public function operationalContexts() : array {
        return $this->getResource('OperationalContext');
    }
    /**
     * @return VehicleType[]
     */
    public function vehicleTypes() : array {
        return $this->getResource('VehicleType');
    }
    /**
     * @return TransportAdministrativeZone[]
     */
    public function transportAdministrativeZones() : array {
        return $this->getResource('TransportAdministrativeZone');
    }
    /**
     * @return RoutePoint[]
     */
    public function routePoints() : array {
        return $this->getResource('RoutePoint');
    }
    /**
     * @return RouteLink[]
     */
    public function routeLinks() : array {
        return $this->getResource('RouteLink');
    }
    /**
     * @return Route[]
     */
    public function routes() : array {
        return $this->getResource('Route');
    }
    /**
     * @return Line[]
     */
    public function lines() : array {
        return $this->getResource('Line');
    }
    /**
     * @return DestinationDisplay[]
     */
    public function destinationDisplays() : array {
        return $this->getResource('DestinationDisplay');
    }
    /**
     * @return ScheduledStopPoint[]
     */
    public function scheduledStopPoints() : array {
        return $this->getResource('ScheduledStopPoint');
    }
    /**
     * @return StopArea[]
     */
    public function stopAreas() : array {
        return $this->getResource('StopArea');
    }
    /**
     * @return PassengerStopAssignment[]
     */
    public function stopAssignments() : array {
        return $this->getResource('PassengerStopAssignment');
    }
    /**
     * @return TimingLink[]
     */
    public function timingLinks() : array {
        return $this->getResource('TimingLink');
    }
    /**
     * @return ServiceJourneyPattern[]
     */
    public function serviceJourneyPatterns() : array {
        return $this->getResource('ServiceJourneyPattern');
    }
    /**
     * @return TimeDemandType[]
     */
    public function timeDemandTypes() : array {
        return $this->getResource('TimeDemandType');
    }
    /**
     * @return AvailabilityCondition[]
     */
    public function availabilityConditions() : array {
        return $this->getResource('AvailabilityCondition');
    }
    /**
     * @return ServiceJourney[]
     */
    public function serviceJourneys() : array {
        return $this->getResource('ServiceJourney');
    }
    /**
     * @return DeadRun[]
     */
    public function deadRuns() : array {
        return $this->getResource('DeadRun');
    }
    /**
     * @return DayType[]
     */
    public function dayTypes() : array {
        return $this->getResource('DayType');
    }
    /**
     * @return DayTypeAssignment[]
     */
    public function dayTypeAssignments() : array {
        return $this->getResource('DayTypeAssignment');
    }
    /**
     * @return Block[]
     */
    public function blocks() : array {
        return $this->getResource('Block');
    }




}