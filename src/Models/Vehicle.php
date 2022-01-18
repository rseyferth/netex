<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Vehicle model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * responsibilitySetRef
 *
 * @property ValidBetween $validBetween Periode dat voertuig in concessie wordt ingezet  - zie uitwerking hieronder
 * @property Extensions $extensions Modaliteit  - zie uitwerking hieronder
 * @property string|null $registrationNumber Kenteken, verplicht voor wegvoertuigen zoals bus. 
 * @property string $operationalNumber Grootwagennummer, treinstelnummer, verplicht in NL profiel
Een OperationalNumber moet uniek zijn binnen een OperatorRef, mag hergebruikt worden voor een ander voertuig 2 jaar na uitfasering vorig voertuig.  
 * @property string|null $privateCode Interne identificatie van het voertuig.
Gebruik hierbij altijd type=”VehicleNumber”.
 * @property Operator $operator 
 * @property VehicleType $vehicleType Zoals gebruikt in NeTEx NL timetable.
 */

class Vehicle extends Record {}