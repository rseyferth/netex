<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * ServiceJourney model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  mixed|null  $keyList
 * @property-read  mixed|null  $validityConditions
 * @property-read  string  $privateCode
 * @property-read  string|null  $monitored
 * @property-read  string  $departureTime
 * @property-read  string|null  $departureDayOffset
 * @property-read  mixed|null  $dayTypes
 * @property-read  mixed  $serviceJourneyPattern
 * @property-read  mixed  $timeDemandType
 * @property-read  mixed|null  $vehicleType
 * @property-read  mixed|null  $operator
 * @property-read  string|null  $print
 * @property-read  string|null  $dynamic
 * @property-read  mixed|null  $flexibleServiceProperties
 */
 
class ServiceJourney extends Record {}