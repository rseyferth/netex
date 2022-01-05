<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * Block model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $name  
 * @property-read  string|null  $name_lang
 * @property-read  string|null  $description  
 * @property-read  string|null  $description_lang
 * @property-read  string  $privateCode  Hier altijd type="BlockCode" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  string|null  $preparationDuration  
 * @property-read  string|null  $startTime  
 * @property-read  string|null  $startTimeDayOffset  
 * @property-read  string|null  $finishingDuration  
 * @property-read  string|null  $endTime  
 * @property-read  string|null  $endTimeDayOffset  
 * @property-read  mixed|null  $dayTypes  
 * @property-read  VehicleType|null  $vehicleType  
 * @property-read  mixed|null  $startPoint  
 * @property-read  mixed|null  $endPoint  
 * @property-read  DeadRun|ServiceJourney[]|null  $journeys  
 */
 
class Block extends Record {}