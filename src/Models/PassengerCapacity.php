<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * VehicleType/capacities/PassengerCapacity model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * 
 *
 * @property string $fareClass Tariefklasse waarvoor de capaciteit wordt opgegeven.
Mogelijke waarden: businessClass | economyClass | firstClass | any
 * @property int $totalCapacity Maximum aantal passagiers.
In de regel gelijk aan StandingCapacity + SeatingCapacity.
 * @property int $seatingCapacity Aantal zitplaatsen.
 * @property int $standingCapacity Aantal staplaatsen.
 * @property int $specialPlaceCapacity Aantal zitplaatsen die speciaal bedoeld zijn voor ouderen, gehandicapten en zwangeren - zie wikipedia.
Dit aantal is al inbegrepen in (dus niet aanvullend op) de bovengenoemde SeatingCapacity.
 * @property int $pushchairCapacity Aantal plaatsen voor kinderwagens.
Dit aantal is al inbegrepen in (dus niet aanvullend op) de bovengenoemde StandingCapacity.
 * @property int $wheelchairPlaceCapacity Aantal rolstoelplaatsen.
Dit aantal is al inbegrepen in (dus niet aanvullend op) de bovengenoemde StandingCapacity.
 */

class PassengerCapacity extends Record {}