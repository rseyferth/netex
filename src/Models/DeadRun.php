<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * DeadRun model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  AvailabilityCondition[]  $validityConditions  
 * @property-read  string  $privateCode  Hier altijd type="JourneyNumber" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  string|null  $monitored  
 * @property-read  string  $departureTime  
 * @property-read  string|null  $departureDayOffset  
 * @property-read  mixed|null  $dayTypes  
 * @property-read  DeadRunJourneyPattern  $deadRunJourneyPattern  
 * @property-read  TimeDemandType  $timeDemandType  
 * @property-read  VehicleType|null  $vehicleType  
 * @property-read  string|null  $deadRunType  
 */
 
class DeadRun extends Record {}