<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * AvailabilityCondition model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Een AvailabilityCondition wordt in een TimetableFrame gekoppeld aan één of meer ritten.
 * id
 * version
 * LET OP: De geldigheidsperiode (FromDate t/m ToDate) mag niet buiten die van de levering vallen! 
 *
 * @property string|null $name (optioneel) Een korte beschrijving van de geldigheidsconditie.
 * @property string $fromDate Dit betreft de operationele dag. De tijd (en tijdzone) zijn niet relevant en worden dus op nul gezet.    Bijvoorbeeld:  <FromDate>2020-10-30T00:00:00Z</FromDate>
 * @property string $toDate Dit betreft de operationele dag. De tijd (en tijdzone) zijn niet relevant en worden dus op nul gezet.    Bijvoorbeeld:  <ToDate>2020-12-12T00:00:00Z</ToDate>
 * @property string $validDayBits De bitString moet van links (FromDate) naar rechts (ToDate) gelezen worden.

Bijvoorbeeld:   <ValidDayBits>11111111110000000000</ValidDayBits>  
Deze ritten zijn alleen geldig van FromDate t/m FromDate+9.
 */

class AvailabilityCondition extends Record {}