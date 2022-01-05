<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * DestinationDisplay model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $name  
 * @property-read  string|null  $name_lang
 * @property-read  string|null  $sideText  
 * @property-read  string|null  $sideText_lang
 * @property-read  string  $frontText  
 * @property-read  string|null  $frontText_lang
 * @property-read  string|null  $privateCode  Hier altijd type="DestinationCode" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  mixed|null  $presentation  
 * @property-read  mixed|null  $vias  
 * @property-read  DestinationDisplayVariant[]  $variants  
 */
 
class DestinationDisplay extends Record {}