<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Operator model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * LET OP: Dit is niet hetzelfde als een merk (bijv. U-OV) - dat wordt vastgelegd onder Branding !
 * id
 * version
 *
 * @property string $name De naam van de vervoerder. De identificatie mag de leverancier zelf bepalen. 
Bijvoorbeeld: “Connexxion”, “Hermes”, “Breng”, “RET”, “Syntus Utrecht”, “U-OV”, “GVB”, “Arriva”.
 * @property string $shortName Afkorting van de Name, die bijvoorbeeld ook past in een bestandsnaam.
 * @property string|null $description Een korte beschrijving van de vervoerder.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 * @property CustomerServiceContactDetails|null $customerServiceContactDetails Contactgegevens (van de klantenservice)  - zie uitwerking hieronder
 */

class Operator extends Record {}