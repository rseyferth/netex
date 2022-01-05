<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * ServiceJourneyPattern model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $name  
 * @property-read  string|null  $name_lang
 * @property-read  Route  $route  
 * @property-read  string|null  $directionType  
 * @property-read  DestinationDisplay  $destinationDisplay  
 * @property-read  mixed  $pointsInSequence  
 */
 
class ServiceJourneyPattern extends Record {}