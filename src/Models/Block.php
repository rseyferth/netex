<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Block model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string $name Naam van de omloop (mag gelijk zijn aan omloopnummer)

 * @property string|null $description 
 * @property string $privateCode Volledig omloopnummer (alleen numerieke waarden). Dit is in het algemeen het nummer waarmee de chauffeur/bestuurder zich op de omloop aanmeldt.
Gebruik attribuuut type="BlockCode".
Via de Vetag-transponder worden de laatste twee cijfers van het omloopnummer gestuurd als Vetag-dienstwagennummer. Bij Vecom worden de laatste 3 cijfers van het omloopnummer gebruikt. (o.a. t.b.v. dynamische haltetoewijzing).   
 * @property string|null $preparationDuration 
 * @property string|null $startTime 
 * @property int|null $startTimeDayOffset 
 * @property string|null $finishingDuration 
 * @property string|null $endTime 
 * @property int|null $endTimeDayOffset 
 * @property mixed $validityConditions 
 * @property DayType[]|\Illuminate\Support\Collection|null $dayTypes Definieert de geldigheid van het Block. 
De koppeling aan concrete (operationele) dagen staat in DayTypeAssignments.
 * @property VehicleServicePart|null $vehicleServicePart Vooralsnog weglaten, want het NL NeTEx Profiel bevat geen VehicleServiceParts om naar te verwijzen.
 * @property VehicleType|null $vehicleType Het (gemeenschappelijke) voertuigtype van de aan het Block gekoppelde ritten. 
De referentie verwijst naar een bestaand VehicleType element.
 * @property Point|null $startPoint 
 * @property Point|null $endPoint 
 * @property Journey $journeys Zowel ServiceJourneys als DeadRuns.
 */

class Block extends Record {}