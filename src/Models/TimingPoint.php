<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TimingPoint model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property KeyValue $keyList Container voor de 'UserStopCode' uit KV1  - zie uitwerking hieronder
Analoog aan de PrivateCode van een ScheduledStopPoint.
 * @property string $name 
 * @property Location $location De coördinaten in het Rijksdriehoeksstelstel  - zie uitwerking hieronder
 * @property PointProjection $projections Koppeling aan een punt op de geografische route  - zie uitwerking hieronder
 */

class TimingPoint extends Record {}