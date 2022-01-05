<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * RouteLink model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $distance
 * @property-read  mixed  $lineString
 * @property-read  PointOnLink[]|null  $passingThrough
 * @property-read  mixed  $fromPoint
 * @property-read  mixed  $toPoint
 * @property-read  mixed|null  $operationalContext
 * @property-read  string  $responsibilitySet
 */
 
class RouteLink extends Record {}