<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * HeadwayJourneyGroup model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $description  
 * @property-read  string|null  $description_lang
 * @property-read  string  $firstDepartureTime  
 * @property-read  string|null  $firstDayOffset  
 * @property-read  string  $lastDepartureTime  
 * @property-read  string|null  $lastDayOffset  
 * @property-read  string|null  $scheduledHeadwayInterval  
 * @property-read  string|null  $minimumHeadwayInterval  
 * @property-read  string|null  $maximumHeadwayInterval  
 */
 
class HeadwayJourneyGroup extends Record {}