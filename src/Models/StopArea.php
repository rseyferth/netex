<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * StopArea model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string  $name  
 * @property-read  string|null  $name_lang
 * @property-read  string|null  $privateCode  Hier altijd type="UserStopAreaCode" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  string|null  $publicCode  
 * @property-read  mixed|null  $topographicPlaceView  
 */
 
class StopArea extends Record {}