<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Organisation model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * In het NL NeTEx Profiel vooralsnog alleen gebruikt voor de financier van de gegevens.
 * id
 * version
 * wellicht nog aanvullen met contactgegevens?
 *
 * @property string $name De naam van de organisatie.
 * @property string $shortName Afkorting van de Name, die bijvoorbeeld ook past in een bestandsnaam.
 * @property string|null $description Een korte beschrijving van de organisatie.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 * @property TypeOfOrganisation[]|\Illuminate\Support\Collection $typesOfOrganisation Het type organisatie  - zie uitwerking hieronder
 */

class Organisation extends Record {}