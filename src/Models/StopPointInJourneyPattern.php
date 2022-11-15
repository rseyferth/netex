<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ServiceJourneyPattern/pointsInSequence/StopPointInJourneyPattern model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * @property string order
 *
 * @property ScheduledStopPoint $scheduledStopPoint De logische halte in de dienstregeling.
 * @property TimingLink|null $onwardTimingLink De verbinding naar de volgende halte (of ander logisch punt) in het ritpatroon.
Ieder PointInJourneyPattern heeft een OnwardTimingLink, behalve het laatste punt in het ritpatroon.
 * @property bool|null $isWaitPoint Geeft aan of het een tijdhalte is. De defaultwaarde is ‘false’. 
Voor het eerste punt in het ritpatroon wordt altijd ‘true’ ingevuld.
 * @property bool|null $forAlighting Geeft aan of de halte als uitstaphalte wordt gebruikt. De defaultwaarde is "true".
Voor een beginhalte geldt veelal ForAlighting="false".
Indien ingevuld vervangt deze de waarde in ScheduledStopPoint. 
 * @property bool|null $forBoarding Geeft aan of de halte als instaphalte wordt gebruikt. De defaultwaarde is "true".
Voor een eindhalte geldt veelal ForBoarding="false".
Indien ingevuld vervangt deze de waarde in ScheduledStopPoint. 
 * @property DestinationDisplay|null $destinationDisplay De bestemming van de rit die bij deze halte getoond moet worden.
Hiermee wordt de waarde op ritniveau overruled.

 */

class StopPointInJourneyPattern extends Record {

    protected array $casts = [
        'isWaitPoint' => 'bool',
        'forAlighting' => 'bool',
        'forBoarding' => 'bool',
    ];

}