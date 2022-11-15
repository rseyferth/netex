<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * @class ServiceJourney
 * ServiceJourney model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Van alle gepubliceerde ritten (Print='true') moet de geldigheid m.b.v. ValidDayBits in een AvailabilityCondition zijn vastgelegd voor de gehele gepubliceerde periode.
 * id
 * version
 *
 * @property KeyValue[]|\Illuminate\Support\Collection|null $keyList Container voor 'DataOwnerIsOperator' uit KV1  - zie uitwerking hieronder
 * @property AvailabilityCondition[]|\Illuminate\Support\Collection|null $validityConditions Wanneer de rit geldig is  - zie uitwerking hieronder
Verplicht voor alle gepubliceerde ritten (Print='true').
 * @property string $privateCode Referentie naar het ‘JourneyNumber’ in de KV.
Gebruik attribuut type=”JourneyNumber”.
 * @property bool|null $monitored Of van deze leverancier ook real-time-berichten (zoals KV6) verwacht mogen worden voor deze rit. Default='true'. 
Deze waarde overschrijft een op lijn- of TimetableFrame niveau gedefinieerde waarde voor Monitored.
 * @property string $departureTime De vertrektijd. De waarde ligt tussen 00:00 tot 24:00 uur.
 * @property int|null $departureDayOffset Waarde=0: de vertrektijd is binnen de kalenderdag die hoort bij de operationele dag.
Waarde=1: de vertrektijd is ná 24:00 uur van de operationele dag, dus op de volgende kalenderdag (bijv. 02:09).
Waarde=-1: de rit start vóór 00:00 uur van de operationele dag, dus op de vorige kalenderdag. 
De defaultwaarde is 0.
 * @property DayType[]|\Illuminate\Support\Collection|null $dayTypes Wordt hier gebruikt om aan te geven op welke dagsoorten (met name dagen van de week) de rit rijdt
 * @property ServiceJourneyPattern $serviceJourneyPattern Het ritpatroon.
 * @property TimeDemandType $timeDemandType De rijtijdgroep.
 * @property VehicleType|null $vehicleType Het voertuigtype.
Een hier gedefinieerde waarde overschrijft het evt. voertuigtype in Block. 
 * @property Operator|null $operator De (uitvoerend) vervoerder.
Deze waarde overschrijft de operator in OperatorView, bijvoorbeeld als de rit is uitbesteed aan een andere vervoerder. 
 * @property bool|null $print Geeft aan of de niet expliciet geplande rit getoond moet worden in gedrukte media. 
Default is ‘true’. 
Van alle ServiceJourneys waarvoor deze waarde 'true' is, moet de geldigheid in de AvailabilityCondition zijn vastgelegd.
 * @property string|null $dynamic Geeft aan of de niet expliciet geplande rit getoond moet worden op displays.
Mogelijke waarden: ‘always’ (default), ‘never’, ‘onlyIfOrdered’ en ‘onlyIfSignedOn’.
 */
class ServiceJourney extends Record {}