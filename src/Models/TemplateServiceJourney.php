<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * TemplateServiceJourney model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  mixed|null  $keyList  
 * @property-read  mixed|null  $validityConditions  
 * @property-read  string|null  $privateCode  Hier altijd type="JourneyNumber" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  string|null  $monitored  
 * @property-read  mixed|null  $dayTypes  
 * @property-read  ServiceJourneyPattern  $serviceJourneyPattern  
 * @property-read  TimeDemandType|null  $timeDemandType  
 * @property-read  VehicleType|null  $vehicleType  
 * @property-read  Operator|null  $operator  
 * @property-read  Line|null  $line  
 * @property-read  FlexibleLine|null  $flexibleLine  
 * @property-read  string|null  $print  
 * @property-read  string|null  $dynamic  
 * @property-read  mixed  $flexibleServiceProperties  
 * @property-read  string  $templateVehicleJourneyType  
 * @property-read  mixed  $frequencyGroups  
 */
 
class TemplateServiceJourney extends Record {}