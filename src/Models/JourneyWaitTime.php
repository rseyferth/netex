<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TimeDemandType/waitTimes/JourneyWaitTime model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * Kies één van de volgende twee verwijzingen:
 *
 * @property ScheduledStopPoint $scheduledStopPoint De bijbehorende halte.
 * @property TimingPoint $timingPoint Het bijbehorende (extra) logische punt.
 * @property string $waitTime De halteringstijd op een halte, als er een aparte aankomst- en vertrektijd is. 
Notatie: “PT…M” voor minuten, “PT…S” voor seconden. 
Bijvoorbeeld:  <WaitTime>PT5M</WaitTime>
 */

class JourneyWaitTime extends Record {}