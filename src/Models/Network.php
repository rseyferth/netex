<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Network model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * De lijst met concessies wordt centraal bijgehouden door DOVA. Vanuit individuele leveringen van de dienstregeling wordt gerefereerd aan het "id".
 * id
 * version
 * status
 *
 * @property string $name Identificatie van de concessie.
 * @property string $shortName Verkorte identificatie van de concessie.
 * @property string|null $description Omschrijving van de concessie.
 * @property string|null $transportMode De (belangrijkste) modaliteit van de concessie.
Het is niet mogelijk meerdere modaliteiten te vermelden. Kies dus de belangrijkste.
 * @property string $groupOfLinesType Geeft aan waarom de lijnen gegroepeerd zijn. 
Bevat altijd de waarde ‘administrative’, die aangeeft dat deze groepering is t.b.v. de administratieve indeling van de concessie.
 * @property Authority $authority De opdrachtgever (concessieverlener). 
De referentie verwijst naar een element in de centrale lijst van DOVA.
Bijvoorbeeld:  ref="DOVA:Authority:ARR"
 */

class Network extends Record {}