<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * PassengerStopAssignment model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $name  
 * @property-read  string|null  $name_lang
 * @property-read  ScheduledStopPoint  $scheduledStopPoint  
 * @property-read  mixed|null  $stopPlace  
 * @property-read  mixed|null  $quay  
 */
 
class PassengerStopAssignment extends Record {}