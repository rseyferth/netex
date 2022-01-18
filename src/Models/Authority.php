<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Authority model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * De lijst met concessieverleners wordt centraal bijgehouden door DOVA. Vanuit individuele leveringen van de dienstregeling wordt gerefereerd aan het "id".
 * id
 * version
 * status
 * Later wellicht nog aan te vullen met extra gegevens (zoals ContactDetails en TypeOfOrganisation)
 *
 * @property string $name De naam van de concessieverlener.
 * @property string $shortName Afkorting van de Name, die bijvoorbeeld ook past in een bestandsnaam.
 * @property string|null $description Een korte beschrijving van de concessieverlener.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 */

class Authority extends Record {}