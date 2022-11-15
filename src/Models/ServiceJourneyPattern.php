<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ServiceJourneyPattern model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string|null $name 
 * @property Route $route De geografische route die (evt. gedeeltelijk) wordt gevolgd.
 * @property string|null $directionType De enumeratie uit de NeTEx standaard wordt gebruikt.
Aan deze waarden moet géén inhoudelijke interpretatie gegeven worden anders dan dat gelijke waarden impliceren dat het om dezelfde richting gaat.
 * @property DestinationDisplay $destinationDisplay De (default)bestemming voor de hele rit.
Kan worden overruled op halteniveau, bijvoorbeeld wanneer halverwege de rit een andere bestemming getoond moet worden.
 * @property TimingPointInJourneyPattern[]|StopPointInJourneyPattern[]|\Illuminate\Support\Collection $pointsInSequence De haltes en andere logische punten (op volgorde)  - zie uitwerking hieronder
 */

class ServiceJourneyPattern extends Record {}