<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DayType model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Deze informatie is slechts informatief, omdat in de "NL NeTEx Profiel" de ritten via de ValidDayBits in een AvailabilityCondition zijn gekoppeld aan specifieke operationele dagen. 
De koppeling van een rit aan een DayType helpt echter bij het begrip van de dienstregeling en daarmee de datacontrole. Bovendien worden ze verwacht in het EPIP.
 * id
 * version
 *
 * @property string|null $name Naam
 * @property string|null $shortName Afkorting (bijv. uit eigen planningssysteem)
 * @property PropertyOfDay[]|\Illuminate\Support\Collection $properties Een beschrijving van de kenmerken van de dagsoort  - zie uitwerking hieronder
 */

class DayType extends Record {}