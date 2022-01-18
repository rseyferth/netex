<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Line model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * responsibilitySetRef
 *
 * @property Branding|null $branding Het merk waaronder de concessie wordt uitgevoerd, indien deze afwijkt van de naam van de vervoerder (Operator).
Let op: een 'merk' is iets op concessieniveau (bijv. "U-OV", "Breng", "Bravo", "RRReis"). Andere benamingen van een aantal lijnen (bijv. "BrengDirect") worden gedefinieerd als 'label' (TypeOfProductCategory). Dit geldt óók voor labels, die in meerdere concessies worden toegepast (bijv. "R-net", "U-link").
 * @property string $name Naam van de lijn.
 * @property string|null $description Omschrijving van de lijn.
 * @property string $transportMode De modaliteit.
Slechts een subset van de waarden uit de NeTEx enumeratie (pti01) wordt gebruikt:  "bus", "tram", "metro", "rail", "water"
 * @property TransportSubmode|null $transportSubmode Verdere onderverdeling binnen modaliteit - zie uitwerking bij OperationalContext
 * @property string $publicCode Het nummer waaronder de lijn bij het publiek bekend is.
 * @property string $privateCode Referentie naar het ‘LinePlanningNumber’ van KV1.
Gebruik hierbij altijd type=”LinePlanningNumber”.
 * @property ExternalObject|null $externalLine Als de geleverde data doorgespeeld wordt naar een Dynamisch Busstation Server wordt hier het VetagLijnNummer gedefinieerd.
Gebruik hierbij altijd type=”LineVeTagNummer”.
 * @property Authority|null $authority De opdrachtgever (concessieverlener). 
De referentie verwijst naar een element in de centrale lijst van DOVA.
Bijvoorbeeld:  ref="DOVA:Authority:ZLD"
 * @property TypeOfProductCategory|null $typeOfProductCategory Het label waaronder de dienst bij de reiziger bekend is.
 * @property TypeOfService $typeOfService De formule (lijnkenmerk), een algemene categorisering van het gedrag, naast of in aanvulling op de TransportSubmode. 
De mogelijke waarden zijn door BISON in een centrale lijst vastgelegd.
 * @property bool $monitored Of er van deze lijn punctualiteitsberichten (zoals KV6) verwacht mogen worden.
 * @property Presentation|null $presentation Kleurstelling en logo  - zie uitwerking hieronder
 * @property AccessibilityAssessment $accessibilityAssessment Toegankelijkheidsinformatie  - zie uitwerking hieronder
 */

class Line extends Record {}