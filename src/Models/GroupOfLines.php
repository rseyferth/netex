<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * GroupOfLines model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $name  
 * @property-read  string|null  $name_lang
 * @property-read  string  $shortName  
 * @property-read  string|null  $shortName_lang
 * @property-read  string|null  $description  
 * @property-read  string|null  $description_lang
 * @property-read  mixed  $members  
 * @property-read  string|null  $transportMode  
 * @property-read  string  $groupOfLinesType  
 */
 
class GroupOfLines extends Record {}