<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * GroupOfLines model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Vooralsnog niet gebruikt in het NL NeTEx Profiel
 * id
 * version
 *
 * @property string $name Identificatie van de lijngroep.
 * @property string $shortName Verkorte identificatie van de lijngroep.
 * @property string|null $description Omschrijving van de lijngroep.
 * @property Line[]|\Illuminate\Support\Collection $members De scope van de lijngroep - zie uitwerking hieronder
 * @property string|null $transportMode De relevante modaliteit.
 * @property string $groupOfLinesType Geeft aan waarom de lijnen gegroepeerd zijn. Mogelijke waarden: "marketing", "administrative", "scheduling", "control", "tariff", "other".
 */

class GroupOfLines extends Record {}