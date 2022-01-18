<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TariffZone model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * De lijst met OV-zones wordt centraal bijgehouden door DOVA. Vanuit individuele leveringen van de dienstregeling wordt gerefereerd aan het "id".
 * id
 * version
 * status
 * Later wellicht nog aan te vullen met extra gegevens
 *
 * @property string $name De naam van de OV-zone.
 * @property string $shortName Afkorting van de Name, die bijvoorbeeld ook past in een bestandsnaam.
 * @property string|null $description Een korte omschrijving van de OV-zone.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 */

class TariffZone extends Record {}