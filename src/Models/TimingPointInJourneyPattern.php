<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**
 * id
 * version
 * @property string order
 *
 * @property TimingPoint|null $timingPoint
 * @property TimingLink|null $onwardTimingLink De verbinding naar de volgende halte (of ander logisch punt) in het ritpatroon.
Ieder PointInJourneyPattern heeft een OnwardTimingLink, behalve het laatste punt in het ritpatroon.
 * @property bool|null $isWaitPoint Geeft aan of het een tijdhalte is. De defaultwaarde is ‘false’. 
Voor het eerste punt in het ritpatroon wordt altijd ‘true’ ingevuld.

 */

class TimingPointInJourneyPattern extends Record {

    protected array $casts = [
        'isWaitPoint' => 'bool',
    ];

}