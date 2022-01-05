<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * JourneyLayover model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $layover  
 * @property-read  ScheduledStopPoint|null  $scheduledStopPoint  
 * @property-read  TimingPoint|null  $timingPoint  
 */
 
class JourneyLayover extends Record {}