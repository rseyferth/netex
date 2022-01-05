<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * Route model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $name  
 * @property-read  string|null  $name_lang
 * @property-read  Line|null  $line  
 * @property-read  FlexibleLine|null  $flexibleLine  
 * @property-read  string  $directionType  
 * @property-read  mixed  $pointsInSequence  
 */
 
class Route extends Record {}