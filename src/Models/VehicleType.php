<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * VehicleType model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  mixed|null  $extensions
 * @property-read  mixed|null  $branding
 * @property-read  string  $name
 * @property-read  string|null  $shortName
 * @property-read  string  $description
 * @property-read  string|null  $privateCode
 * @property-read  string  $typeOfFuel
 * @property-read  string|null  $euroClass
 * @property-read  mixed  $capacities
 * @property-read  string  $lowFloor
 * @property-read  string  $hasLiftOrRamp
 * @property-read  string|null  $hasHoist
 * @property-read  string|null  $boardingHeight
 * @property-read  string|null  $gapToPlatform
 * @property-read  string  $length
 * @property-read  string|null  $width
 * @property-read  string|null  $height
 * @property-read  string|null  $weight
 * @property-read  ServiceFacilitySet[]  $facilities
 * @property-read  string  $transportMode
 */
 
class VehicleType extends Record {}