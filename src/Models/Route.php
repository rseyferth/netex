<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Route model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Zie ook de algemene toelichting op routes in het NL NeTEx Profiel.
 * id
 * version
 *
 * @property string|null $name De naam van de fysieke route.
 * @property Line $line Een route is gekoppeld aan één lijn.
 * @property string $directionType De enumeratie uit de NeTEx standaard wordt gebruikt.
Aan deze waarden moet géén inhoudelijke interpretatie gegeven worden anders dan dat gelijke waarden impliceren dat het om dezelfde richting gaat.
 * @property PointOnRoute[]|\Illuminate\Support\Collection $pointsInSequence De routepunten (op volgorde)  - zie uitwerking hieronder
 */

class Route extends Record {}