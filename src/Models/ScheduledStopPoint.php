<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * ScheduledStopPoint model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $name
 * @property-read  string  $location
 * @property-read  PointProjection[]  $projections
 * @property-read  mixed|null  $stopAreas
 * @property-read  mixed|null  $tariffZones
 * @property-read  string|null  $privateCode
 * @property-read  string  $forAlighting
 * @property-read  string  $forBoarding
 */
 
class ScheduledStopPoint extends Record {}