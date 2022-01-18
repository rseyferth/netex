<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DestinationDisplay/variants/DestinationDisplayVariant model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * De Presentation wordt niet herhaald in de DestinationDisplayVariant. De kleuren enz. gedefinieerd in de DestinationDisplay gelden voor álle varianten.
 *
 * @property Extensions $extensions Bevat de tekstlengte van deze variant  - zie uitwerking hieronder
 * @property string $destinationDisplayVariantMediaType Bevat altijd de waarde "any".
Dit veld is verplicht in de totale NeTEx standaard, maar voegt in het NL NeTEx Profiel niets toe.
 * @property string $name Ingekorte tekstuele weergave van de eindbestemming – zonder via-bestemmingen!
 * @property Via[]|\Illuminate\Support\Collection|null $vias Eventuele ingekorte via-bestemmingen  - zie uitwerking hieronder
Deze zijn dus NIET verwerkt in de Name!
 */

class DestinationDisplayVariant extends Record {}