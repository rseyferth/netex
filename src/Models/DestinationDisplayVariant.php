<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * DestinationDisplayVariant model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  mixed  $extensions  De maximale tekstlengte (MaxLength) van de variant m.b.v. de BISON standaardenumeratie (DisplayTextLength)
 * @property-read  string  $destinationDisplayVariantMediaType  
 * @property-read  string  $name  
 * @property-read  string|null  $name_lang
 * @property-read  mixed|null  $vias  
 */
 
class DestinationDisplayVariant extends Record {}