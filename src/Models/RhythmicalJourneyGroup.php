<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * RhythmicalJourneyGroup model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $description
 * @property-read  string  $firstDepartureTime
 * @property-read  string|null  $firstDayOffset
 * @property-read  string  $lastDepartureTime
 * @property-read  string|null  $lastDayOffset
 * @property-read  mixed  $timebands
 */
 
class RhythmicalJourneyGroup extends Record {}