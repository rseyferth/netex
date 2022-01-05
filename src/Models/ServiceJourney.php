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
 * @property-read  string  $privateCode  Hier altijd type="JourneyNumber" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  string|null  $monitored  
 * @property-read  string  $departureTime  
 * @property-read  string|null  $departureDayOffset  
 * @property-read  mixed|null  $dayTypes  
 * @property-read  ServiceJourneyPattern  $serviceJourneyPattern  
 * @property-read  TimeDemandType  $timeDemandType  
 * @property-read  VehicleType|null  $vehicleType  
 * @property-read  Operator|null  $operator  
 * @property-read  string|null  $print  
 * @property-read  string|null  $dynamic  
 * @property-read  mixed|null  $flexibleServiceProperties  
 */
 
class ServiceJourney extends Record {}