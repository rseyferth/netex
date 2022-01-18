<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TimeDemandType/runTimes/JourneyRunTime model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property TimingLink $timingLink De bijbehorende verbinding (tussen de twee haltes).
 * @property string $runTime De rijtijd tussen twee haltes, inclusief een korte halteringstijd.
Notatie: “PT…M” voor minuten, “PT…S” voor seconden. 
Bijvoorbeeld:  <RunTime>PT3M</RunTime>   of   <RunTime>PT50S</RunTime>
 */

class JourneyRunTime extends Record {}