<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * ActivationPoint model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  string|null  $location  
 * @property-read  string  $privateCode  Hier altijd type="KarAddress" gebruiken
 * @property-read  string  $privateCode_type
 * @property-read  mixed  $typeOfActivation  
 */
 
class ActivationPoint extends Record {}