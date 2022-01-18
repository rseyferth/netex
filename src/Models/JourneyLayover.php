<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TimeDemandType/layovers/JourneyLayover model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * Kies één van de volgende twee verwijzingen:
 *
 * @property string $layover De in de dienstregeling ingebouwde marge (bijstuurtijd) in het traject naar een halte. Geeft de speelruimte in de dienstregeling, d.w.z. het verschil tussen de geplande rijtijd (JourneyRunTime) en de reële rijtijd.
Zie ook de toelichting in het NL NeTEx Profiel document.
Notatie: “PT…M” voor minuten, “PT…S” voor seconden. 
Bijvoorbeeld:  <Layover>PT2M</Layover>
In het NL NeTEx Profiel hoeft dit niet alleen 'aan het einde van de rit' te zijn.
 * @property ScheduledStopPoint $scheduledStopPoint De bijbehorende halte.
 * @property TimingPoint $timingPoint Het bijbehorende (extra) logische punt.
 */

class JourneyLayover extends Record {}