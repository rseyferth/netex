<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * DestinationDisplay model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $name
 * @property-read  string|null  $sideText
 * @property-read  string  $frontText
 * @property-read  string|null  $privateCode
 * @property-read  mixed|null  $presentation
 * @property-read  mixed|null  $vias
 * @property-read  DestinationDisplayVariant[]  $variants
 */
 
class DestinationDisplay extends Record {}