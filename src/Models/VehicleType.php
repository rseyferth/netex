<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * VehicleType model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Deze definitie is aangepast/uitgebreid t.o.v. v9.2.0 van het NL dienstregeling Profiel.
 * id
 * version
 *
 * @property Extensions|null $extensions Het label waarvoor het voerguigtype is opgetuigd, indien van toepassing  - zie uitwerking hieronder
Deze waarde heeft prioriteit boven het merk (Branding) en de vervoerder (Operator).
 * @property Branding|null $branding Het merk waarvoor het voertuigtype is opgetuigd, indien deze afwijkt van de naam van de vervoerder (Operator).
Zie de (bestaande) definitie en uitleg in het NL dienstregeling Profiel.
 * @property string $name 
 * @property string|null $shortName 
 * @property string $description 
 * @property string|null $privateCode Interne identificatie van het voertuigtype.
Gebruik hierbij altijd type=”VoertuigTypeCode”.
 * @property string $typeOfFuel Type brandstof. 
Mogelijke waarden: petrol | diesel | naturalGas | biodiesel | electricity | hydrogen | other.
De waarde 'hydrogen' (waterstof) is toegevoegd in het NL voertuigen Profiel.


 * @property string|null $euroClass Europese emissieklasse van het voertuigtype. Zie Wikipedia voor meer informatie. Notatiewijze: "Euro X".
Dit kenmerk is verplicht voor wegvoertuigen. 
Bijvoorbeeld:  <EuroClass>Euro 6b</EuroClass>
 * @property PassengerCapacity[]|\Illuminate\Support\Collection $capacities Maximum aantal reizigers dat in het voertuig kan  - zie uitwerking hieronder
 * @property bool $lowFloor Reizigers met rollator beoordelen vaak dat bij een toegankelijke halte en een lage vloer voertuig zij zelfstandig kunnen reizen.  
 * @property bool $hasLiftOrRamp 
 * @property bool|null $hasHoist 
 * @property float|null $boardingHeight De vloerhoogte/instaphoogte bij de middelste deur (en knielen) in meters.
Bijvoorbeeld:  <BoardingHeight>0.60</BoardingHeight>
 * @property float|null $gapToPlatform Horizontale spleetbreedte tussen voertuigvloer en perron,  bepaalt bij 'gelijkvloerse' instap de mate van toegankelijkheid voor rolsloelgebruikers.
 * @property float $length 
 * @property float|null $width 
 * @property float|null $height 
 * @property float|null $weight 
 * @property ServiceFacilitySet[]|\Illuminate\Support\Collection $facilities Andere (toegankelijkheids)voorzieningen  - zie uitwerking hieronder
 * @property string $transportMode De modaliteit.
Slechts een subset van de waarden uit de NeTEx enumeratie (pti01) wordt gebruikt:
"bus", "tram", "metro", "rail", "water", "all", "unknown"
De modaliteit bepaalt o.a. of kenteken relevant is.
 */

class VehicleType extends Record {}