<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * VehicleType model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  mixed|null  $extensions  
 * @property-read  Branding|null  $branding  
 * @property-read  string  $name  
 * @property-read  string|null  $name_lang
 * @property-read  string|null  $shortName  
 * @property-read  string|null  $shortName_lang
 * @property-read  string  $description  
 * @property-read  string|null  $description_lang
 * @property-read  string|null  $privateCode  Hier altijd type="VoertuigTypeCode" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  string  $typeOfFuel  
 * @property-read  string|null  $euroClass  Zie Wikipedia voor de mogelijke waarden
 * @property-read  mixed  $capacities  Capaciteit per tariefklasse
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