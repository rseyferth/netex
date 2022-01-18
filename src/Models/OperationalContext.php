<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * OperationalContext model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * Op Europees niveau wordt momenteel gewerkt aan een nieuwe (geharmoniseerde) opzet van de Modes, gebaseerd op de nieuwe PTS tabellen van TPEG2 en tevens met extra modaliteiten.
 *
 * @property string $vehicleMode De modaliteit.
Slechts een subset van de waarden uit de NeTEx enumeratie (pti01) wordt gebruikt:
"bus", "tram", "metro", "rail", "water", "all", "unknown"
 * @property TransportSubmode|null $transportSubmode Een verdere onderverdeling binnen de modaliteit - zie uitwerking hieronder
 */

class OperationalContext extends Record {}