<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * TimeDemandType model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $name
 * @property-read  JourneyRunTime[]  $runTimes
 * @property-read  JourneyWaitTime[]|null  $waitTimes
 * @property-read  JourneyLayover[]|null  $layovers
 */
 
class TimeDemandType extends Record {}