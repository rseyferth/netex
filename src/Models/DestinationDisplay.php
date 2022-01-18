<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DestinationDisplay model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string $name Tekstuele weergave van de eindbestemming – zonder via-bestemmingen!
 * @property string|null $sideText De volledige bestemmingstekst, zoals die op de zijkant van het voertuig staat.
Dus inclusief de via-bestemming (als deze wordt getoond).
 * @property string $frontText De volledige bestemmingstekst, zoals die op de voorkant van het voertuig staat.
Dus inclusief de via-bestemming (als deze wordt getoond).
 * @property string|null $privateCode Verwijzing naar de 'DestinationCode’ van KV1.
Gebruik hierbij altijd type=”DestinationCode”.
 * @property Presentation|null $presentation Kleurstelling en/of logo van de bestemming  - zie uitwerking hieronder
 * @property Via[]|\Illuminate\Support\Collection|null $vias Eventuele via-bestemmingen  - zie uitwerking hieronder
Deze zijn NIET verwerkt in de Name, wel in FrontText en SideText!
 * @property DestinationDisplayVariant[]|\Illuminate\Support\Collection $variants Ingekorte teksten voor gebruik op displays  - zie uitwerking hieronder
 */

class DestinationDisplay extends Record {}