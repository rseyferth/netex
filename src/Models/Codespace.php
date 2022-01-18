<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Codespace model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Kunnen in de NeTEx standaard alleen in het CompositeFrame worden vastgelegd.
 * id
 *
 * @property string $xmlns Het voorvoegsel van dit domein - gebruikt in identifiers.
Bijvoorbeeld:   'ARR'  in  id="ARR:Line:4040"
 * @property string $xmlnsUrl Wereldwijde unieke identificatie van het domein.
Voor de door BISON gedefinieerde domeinen:  http://bison.dova.nu/ns/XXXXX
 * @property string $description Een korte omschrijving van het domein.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 */

class Codespace extends Record {}