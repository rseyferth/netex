<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Branding model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Het merk is de marketingclassificatie, waaronder de OV-dienst zich primair presenteert aan de reiziger. 
Dit kunnen zowel overkoepelende (bijv. “Blauwnet”, “RRReis”, “Bravo”) als concessiekenmerken (bijv. “Breng”, “Syntus Overijssel”, “U-OV”) zijn. 
Namen, die slechts voor een deel van de lijnen in een concessie worden gebruikt, zijn géén ‘merk’. 
Als een reiziger nadere informatie wil over de OV-diensten kan worden gezocht naar de merknaam.
 * id
 * version
 *
 * @property string $name De naam van het merk. De identificatie mag men zelf bepalen.
Bijvoorbeeld:  “Blauwnet”, "Syntus Overijssel"
 * @property string|null $description Omschrijving van het merk.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 * @property string|null $image Verwijzing naar een algemene afbeelding m.b.t. het merk.
Let op de afspraken m.b.t. URLs, bestandsnamen en ondersteunde afbeeldingstypen!
Bijvoorbeeld: "http://www.blauwnet.nl/kaart-blauwnet.jpg"
 * @property string|null $url Website van het merk.
 * @property Presentation|null $presentation Kleurstelling en logo  - zie uitwerking bij TypeOfValue
 */

class Branding extends Record {}