<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TypeOfProductCategory model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Een label is een specifiek (kwaliteits)kenmerk van een lijn. 
Een label zal meestal slechts voor een deel van lijnen van een concessie gelden en kan dus veelal worden gezien als een ‘onderverdeling’ binnen een merk / vervoerder. 
Voorbeelden zijn: “BrengDirect”, “Brabantliner”, “BravoDirect”, “R-Net”, “U-link”, “Qlink”, “Qliner”, “Nachtvlinder”, “FlexiGo” en “Kolibrie”.
 * id
 * version
 *
 * @property string $name De naam van het label. De identificatie mag men zelf bepalen.
Bijvoorbeeld “BrengFlex”, “Nachtvlinder”, “FlexiGo”, “Kolibrie”
 * @property string|null $description Omschrijving van het label.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 * @property string|null $image Verwijzing naar een algemene afbeelding m.b.t. het label.
Let op de afspraken m.b.t. URLs, bestandsnamen en ondersteunde afbeeldingstypen!
Bijvoorbeeld: "http://www.allgo.nl/kaart-nightgo.jpg"
 * @property string|null $url Website van het label.
 * @property Presentation|null $presentation Kleurstelling en logo  - zie uitwerking bij TypeOfValue
 */

class TypeOfProductCategory extends Record {}