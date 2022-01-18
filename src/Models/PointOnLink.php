<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * RouteLink/passingThrough/PointOnLink model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property float $distanceFromStart De positie (via het beschreven pad) vanaf het begin van de verbinding in meters. De waarde moet kleiner zijn dan de totale lengte van de verbinding!
 * @property ActivationPoint $activationPoint Het KAR-punten dat wordt gepasseerd.
 */

class PointOnLink extends Record {}