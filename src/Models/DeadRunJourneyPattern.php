<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DeadRunJourneyPattern model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string|null $name 
 * @property StopPointInJourneyPattern[]|\Illuminate\Support\Collection $pointsInSequence De haltes en andere logische punten (op volgorde)  - zie uitwerking hieronder
 */

class DeadRunJourneyPattern extends Record {}