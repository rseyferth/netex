<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * AvailabilityCondition model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $name  
 * @property-read  string|null  $name_lang
 * @property-read  string  $fromDate  
 * @property-read  string  $toDate  
 * @property-read  string  $validDayBits  De ValidDayBits worden van links (FromDate) naar rechts (ToDate, inclusief) gelezen.
 */
 
class AvailabilityCondition extends Record {}