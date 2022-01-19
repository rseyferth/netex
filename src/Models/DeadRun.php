<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DeadRun model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property AvailabilityCondition[]|\Illuminate\Support\Collection $validityConditions Wanneer de rit geldig is  - zie uitwerking hieronder
 * @property string $privateCode Referentie naar het ‘JourneyNumber’ in de KV.
Gebruik attribuut type=”JourneyNumber”.
 * @property bool|null $monitored Of van deze leverancier ook real-time-berichten (zoals KV6) verwacht mogen worden voor deze rit.
Alleen invullen indien anders dan de waarde bij de lijn of in het TimetableFrame.
 * @property string $departureTime De vertrektijd. De waarde ligt tussen 00:00 tot 24:00 uur.
 * @property int|null $departureDayOffset Waarde=0: de vertrektijd is binnen de kalenderdag die hoort bij de operationele dag.
Waarde=1: de vertrektijd is ná 24:00 uur van de operationele dag, dus op de volgende kalenderdag (bijv. 02:09).
Waarde=-1: de rit start vóór 00:00 uur van de operationele dag, dus op de vorige kalenderdag. 
De defaultwaarde is 0.
 * @property DayType[]|\Illuminate\Support\Collection|null $dayTypes De dagsoorten waarvoor de rit bedoeld is  - zie uitwerking hieronder
 * @property ServiceJourneyPattern $deadRunJourneyPattern Het ritpatroon.
 * @property TimeDemandType $timeDemandType De rijtijdgroep.
 * @property VehicleType|null $vehicleType Het voertuigtype.
Een hier gedefinieerde waarde overschrijft het evt. voertuigtype in Block. 
 * @property string|null $deadRunType Soort materieelrit.
Mogelijke waarden: ‘garageRunOut’, ‘garageRunIn’, ‘turningManoeuvre’ of ‘other’.
 */

class DeadRun extends Record {}