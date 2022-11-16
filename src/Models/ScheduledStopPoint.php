<?php
namespace Wipkip\NeTEx\Models;
use Illuminate\Support\Arr;
use Wipkip\NeTEx\Parser\InvalidReference;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ScheduledStopPoint model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * De logische halte is m.b.v. een projection gerelateerd aan een RoutePoint op de geografische beschrijving van de route.
 * De koppeling met de Quay of StopPlace in het CHB is vastgelegd in een PassengerStopAssignment. 
 * id
 * version
 *
 * @property string $name 
 * @property Location $location De coördinaten in het Rijksdriehoeksstelstel  - zie uitwerking hieronder
 * @property PointProjection[]|\Illuminate\Support\Collection $projections Koppeling aan een punt op de geografische route  - zie uitwerking hieronder
 * @property StopArea[]|\Illuminate\Support\Collection|null $stopAreas (optioneel) Bundeling van haltes   - zie uitwerking hieronder
 * @property TariffZone[]|\Illuminate\Support\Collection $tariffZones Tot welke zone(s) de halte behoort  - zie uitwerking hieronder
 * @property string $privateCode Referentie naar de ‘UserStopCode’ van KV1.
Gebruik hierbij altijd type=”UserStopCode”.
 * @property bool $forAlighting Geeft aan of de halte in principe als uitstaphalte kan worden gebruikt. Dit kan evt. overruled worden per ServiceJourneyPattern. De defaultwaarde is ‘true’.
 * @property bool $forBoarding Geeft aan of de halte in principe als instaphalte kan worden gebruikt. Dit kan evt. overruled worden per ServiceJourneyPattern. De defaultwaarde is ‘true’.
 */

class ScheduledStopPoint extends Record {

    protected array $casts = [
        'forAlighting' => 'bool',
        'forBoarding' => 'bool',
    ];



    public function getZoneCodes(): array {

        // A bit hacky, but we'll use the zone-id at the end of the reference (DOVA:TariffZone:1234)
        return $this->tariffZones ? $this->tariffZones->map(function (InvalidReference $ref) {
            return Arr::last(explode(':', $ref->id));
        })->toArray() : [];
    }


}