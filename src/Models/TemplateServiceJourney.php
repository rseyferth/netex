<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * TemplateServiceJourney model class 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 *
 * @property-read  mixed|null  $keyList
 * @property-read  mixed|null  $validityConditions
 * @property-read  string|null  $privateCode
 * @property-read  string|null  $monitored
 * @property-read  mixed|null  $dayTypes
 * @property-read  mixed  $serviceJourneyPattern
 * @property-read  mixed|null  $timeDemandType
 * @property-read  mixed|null  $vehicleType
 * @property-read  mixed|null  $operator
 * @property-read  mixed|null  $line
 * @property-read  mixed|null  $flexibleLine
 * @property-read  string|null  $print
 * @property-read  string|null  $dynamic
 * @property-read  mixed  $flexibleServiceProperties
 * @property-read  string  $templateVehicleJourneyType
 * @property-read  mixed  $frequencyGroups
 */
 
class TemplateServiceJourney extends Record {}