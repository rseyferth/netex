<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ResponsibilitySet model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * LET OP: 
Hier wordt alleen de structuur (met de mogelijke veldwaarden) beschreven. 
De concrete invulling verschilt per Profiel en is dus vastgelegd in de beschrijving van het ResourceFrame in de betreffende Profielen.
 * id
 * version
 *
 * @property string|null $name De naam van de hier beschreven verantwoordelijkheden.
Dit is vooral handig voor de leesbaarheid en dus het begrip van de structuren.
Bijvoorbeeld: "concessie X" of "partitie Y" of "financier Z"
 * @property ResponsibilityRoleAssignment[]|\Illuminate\Support\Collection $roles Toekenning van de verantwoordelijkheden  - zie uitwerking hieronder
 */

class ResponsibilitySet extends Record {}