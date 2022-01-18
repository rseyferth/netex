<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * VehicleType/facilities/ServiceFacilitySet model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string|null $mobilityFacilityList Mogelijke waarden: unknown | lowFloor | stepFreeAccess | suitableForWheelchairs | suitableForHeavilyDisabled | boardingAssistance | onboardAssistance | unaccompaniedMinorAssistance | tactilePlatformEdges | tactileGuidingStrips
De waarden worden gescheiden door een spatie. 
Indien de lijst wordt weglaten betekent dit dat het voertuigtype niet toegankelijk is voor gehandicapten.

Om te bepalen in hoeverre zelfstandig kan worden gereisd gelden de volgende regels:
 - stepFreeAccess prevaleert boven boardingAsstance en onboardAssistance
 - boardingAssistance prevaleert boven onboardAssistance

Uit de combinatie van kenmerken kan worden afgeleid een voertuig zelfstandig, met beperkte hulp of met assistentie toegankelijk is. 
Bijvoorbeeld:
<MobilityFacilityList>stepFreeAccess suitableForWheelChairs</MobilityFacilityList> geeft aan dat rolstoelgebruiker zelfstandig kan instappen.
<MobilityFacilityList>suitableForWheelChairs boardingAssistance</MobilityFacilityList> geeft aan dat reiziger met rolstoel moet reserveren voor reisassistentie.
 * @property string|null $passengerCommsFacilityList Of er "powerSupplySockets" en/of "freeWifi" aanwezig is. 
De waarden worden gescheiden door een spatie. 
Andere waarden zijn vooralsnog niet relevant voor het Nederlands Profiel.
Bijvoorbeeld:
  <PassengerCommsFacilityList>freeWifi powerSupplySockets</PassengerCommsFacilityList>
 * @property string|null $sanitaryFacilityList Of er een "wheelchairAccessToilet" en/of een (gewoon) "toilet" aanwezig is. 
De waarden worden gescheiden door een spatie.
Andere waarden zijn vooralsnog niet relevant voor het Nederlands Profiel.
Bijvoorbeeld:
  <SanitaryFacilityList>toilet wheelChairAccessToilet</SanitaryFacilityList>
 * @property string|null $ticketingServiceFacilityList Of er "collection" apparatuur (een OVCK ophaalpunt) aanwezig is.
Andere waarden zijn vooralsnog niet relevant voor het Nederlands Profiel.
Bijvoorbeeld:  <TicketingServiceFacilityList>collection</TicketingServiceFacilityList>
 * @property string $vehicleAccessFacilityList Deze waarde geeft aan of de gebruiker met een motorische beperking voor de toegankelijkheid van het voertuig technische hulpmiddelen nodig heeft, en in het geval van automatische hulpmiddelen defect kunnen gaan. 
Mogelijke waarden: unknown | lift | wheelchairLift | escalator | travelator | ramp | automaticRamp | steps | stairs | slidingStep | shuttle | narrowEntrance | barrier | lowFloorAccess | validator| levelFloorAccess.
De waarden worden gescheiden door een spatie. 
narrowEntrance en validator worden niet gebruikt in Nederland
Bijvoorbeeld:
  <VehicleAccessFacilityList>wheelchairLift slidingStep</VehicleAccessFacilityList>
 */

class ServiceFacilitySet extends Record {}