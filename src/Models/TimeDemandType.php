<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TimeDemandType model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string|null $name 
 * @property JourneyRunTime[]|\Illuminate\Support\Collection $runTimes De rijtijden tussen twee haltes  - zie uitwerking hieronder
 * @property JourneyWaitTime[]|\Illuminate\Support\Collection|null $waitTimes Expliciete halteringstijden op bepaalde haltes  - zie uitwerking hieronder
 * @property JourneyLayover[]|\Illuminate\Support\Collection|null $layovers In de dienstregeling ingebouwde marge  - zie uitwerking hieronder
 */

class TimeDemandType extends Record {}