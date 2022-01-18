<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * RouteLink model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * responsibilitySetRef
 *
 * @property float $distance De totale lengte van de verbinding in meters.
 * @property string $gml:LineString Het geografische pad van het OV-voertuig tussen twee RoutePoints in de GML-notatie: een lijst met setjes RD-coördinaten (x y) voor de relevante kruispunten en/of buigpunten, alles gescheiden door spaties.
Bijvoorbeeld:
  <gml:posList>111420 516916 111565 516840 111723 516503</gml:posList>
 * @property PointOnLink[]|\Illuminate\Support\Collection|null $passingThrough Extra logische punten die onderweg gepasseerd worden - zie uitwerking hieronder
 * @property RoutePoint $fromPoint Het RoutePoint dat de halte (of ander logisch punt) aan het begin van de link representeert.
 * @property RoutePoint $toPoint Het RoutePoint dat de halte (of ander logisch punt)  aan het einde van de link representeert.
 * @property OperationalContext|null $operationalContext Het is mogelijk per modaliteit een aparte link te definiëren, bijvoorbeeld in het geval van aparte bus- en trambanen.
 */

class RouteLink extends Record {}