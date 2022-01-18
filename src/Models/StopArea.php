<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * StopArea model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Let op het verschil tussen StopArea en StopPlace! 
Een StopArea bundelt logische haltes (ScheduledStopPoint), terwijl een StopPlace een bundeling is van fysieke haltes (Quay). 
De StopAreas worden (optioneel) meegeleverd in de dienstregeling, de StopPlaces zijn te vinden in het Centraal HalteBestand. 
 * id
 * version
 *
 * @property string $name 
 * @property string|null $description Omschrijving van de bundeling van haltes.
 * @property string|null $privateCode Referentie naar de ‘UserStopAreaCode’ van KV1.
Gebruik hierbij altijd type=”UserStopAreaCode”.
 * @property string|null $publicCode De naam waaronder de haltes (gezamenlijk) bij de reiziger bekend staan.
 * @property TopographicPlaceView|null $topographicPlaceView Bevat de naam van de bijbehorende stad of dorp  - zie uitwerking hieronder
 */

class StopArea extends Record {}