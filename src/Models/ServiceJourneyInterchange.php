<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ServiceJourneyInterchange model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Vooralsnog alleen gebruikt om aan te geven dat ritten structureel gekoppeld zijn (zodat de reiziger kan blijven zitten in het voertuig).
 * id
 * version
 *
 * @property bool|null $staySeated Geeft aan of de reiziger in hetzelfde voertuig kan blijven zitten.
 * @property bool|null $guaranteed Geeft aan of de overstap 'onder alle omstandigheden' is gegarandeerd.
Ook als volgens planning StaySeated=true kan het tijdens de exploitatie toch nodig blijken voor de vervolgrit een ander voertuig in te zetten.
 * @property ScheduledStopPoint $fromPoint Aankomsthalte van de aanvoerende rit.
 * @property ScheduledStopPoint $toPoint Vertrekhalte van de vervolgrit.
In het geval van StaySeated=true waarschijnlijk meestal gelijk aan FromPointRef.
 * @property VehicleJourney $fromJourney Aanvoerende rit.
 * @property VehicleJourney $toJourney Vervolgrit.
 */

class ServiceJourneyInterchange extends Record {}