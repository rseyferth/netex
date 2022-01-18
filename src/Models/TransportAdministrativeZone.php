<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * TransportAdministrativeZone model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * De constraints in het NeTEx-xsd eisen dat de verwijzing in een ResponsibilitySet altijd een TransportAdministrativeZone is. 
De daadwerkelijke koppeling van deze TransportAdministrativeZone aan bijvoorbeeld een Network kan vervolgens (formeel) door deze TAZ te 'projecteren' op de gewenste structuur m.b.v. een ComplexFeature.
Om het eenvoudig te houden wordt deze extra tussenstap via het ComplexFeature echter niet geïmplementeerd, maar wordt de relatie met (bijvoorbeeld) de Network afgeleid uit de gelijke identificatie (ShortName) van de twee elementen.
 * id
 * version
 *
 * @property string|null $name De naam van het 'gebied'.
 * @property string $shortName Afkorting van de Name, die bijvoorbeeld ook past in een bestandsnaam.
Indien de scope van het 'gebied' expliciet wordt vastgelegd, moet deze ShortName identiek zijn aan de ShortName van het element, dat die scope beschrijft.
In het NL NeTEx Profiel is dat vooralsnog alleen voor de concessie (Network).
 * @property string|null $description Hier kan men vermelden voor welk ander element (bijv. Network) dit een ondersteunend element is.
Dit is vooral handig voor de leesbaarheid en het begrip van de gegevens.
 */

class TransportAdministrativeZone extends Record {}