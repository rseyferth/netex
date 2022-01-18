<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TypeOfValue model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string $name De naam van het lijstelement.
 * @property string|null $description Beschrijving van het lijstelement.
 * @property string|null $image Verwijzing naar een algemene afbeelding m.b.t. het lijstelement.
Let op de afspraken m.b.t. URLs, bestandsnamen en ondersteunde afbeeldingstypen!
 * @property string|null $url Website m.b.t. het lijstelement.
 * @property Presentation|null $presentation Kleurstelling en logo  - zie uitwerking hieronder
 */

class TypeOfValue extends Record {}