<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TimingLink model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * De koppeling aan de financier (CONFINREL) ligt niet hier, maar op de RouteLink.
 * id
 * version
 *
 * @property float $distance De afstand over de weg in meters.
Is in beginsel gelijk aan de Distance van de bijbehorende RouteLink.
 * @property TimingPoint $fromPoint De halte (of ander logisch punt) aan het begin van de verbinding.
 * @property TimingPoint $toPoint De halte (of ander logisch punt)  aan het einde van de verbinding.
 * @property OperationalContext|null $operationalContext Het is mogelijk per modaliteit een aparte verbinding te definiëren, bijvoorbeeld in het geval van aparte bus- en trambanen.
 */

class TimingLink extends Record {}