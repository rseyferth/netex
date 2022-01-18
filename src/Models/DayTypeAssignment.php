<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DayTypeAssignment model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Elke dagsoort die in een VehicleScheduleFrame t.b.v Blocks wordt gebruikt, is gekoppeld aan één of meer (operationele) dagen uit de geldigheidsperiode van de levering. 
Voor de geldigheid van afzonderlijke ServiceJourneys in een TimetableFrame wordt de DayTypeAssignment echter niet gebruikt. Die geldigheid ligt vast via ValidDayBits in een AvailabilityCondition.
 * id
 * version
 * order
 *
 * @property string|null $date De datum, weergegeven als “jjjj-mm-dd”.
 * @property DayType|null $dayType De dagsoort die aan de datum wordt gekoppeld.
De referentie verwijst naar een DayType element.
 */

class DayTypeAssignment extends Record {}