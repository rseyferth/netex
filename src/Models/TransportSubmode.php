<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * OperationalContext/TransportSubmode model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Op Europees niveau wordt momenteel gewerkt aan een nieuwe (geharmoniseerde) opzet van de Modes, gebaseerd op de nieuwe PTS tabellen van TPEG2 en tevens met extra modaliteiten.
 *
 * @property string $busSubmode Onderverdeling voor VehicleMode="bus".
Slechts een subset van de waarden uit de NeTEx enumeratie (pti05) wordt gebruikt:
 "localBus"
 "regionalBus"
 "expressBus"
 "nightBus"
 "mobilityBus"
 "shuttleBus"
 "highFrequencyBus"
 "schoolBus"
 "schoolAndPublicServiceBus"
 "railReplacementBus"
 "demandAndResponseBus"
 “unknown”
 “undefined”
 * @property string $metroSubmode Onderverdeling voor VehicleMode="metro".
Slechts een subset van de waarden uit de NeTEx enumeratie (pti04) wordt gebruikt:
 "metro"
 "urbanRailway"
 “unknown”
 “undefined”
 * @property string $tramSubmode Onderverdeling voor VehicleMode="tram".
Slechts een subset van de waarden uit de NeTEx enumeratie (pti06) wordt gebruikt:
 "cityTram"
 "localTram"
 "regionalTram"
 "trainTram"
 “unknown”
 “undefined”
 * @property string $railSubmode Onderverdeling voor VehicleMode="rail".
Slechts een subset van de waarden uit de NeTEx enumeratie (pti02) wordt gebruikt:
 "local"
 "highSpeedRail"
 "suburbanRailway"
 "regionalRail"
 "longDistance"
 "international"
 "specialTrain"
 “unknown”
 “undefined”
 * @property string $waterSubmode Onderverdeling voor VehicleMode="water".
Slechts een subset van de waarden uit de NeTEx enumeratie (pti07) wordt gebruikt:
 "localCarFerry"
 "localPassengerFerry"
 "riverBus"
 “unknown”
 “undefined”
 */

class TransportSubmode extends Record {}