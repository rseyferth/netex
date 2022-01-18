<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ActivationPoint model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property Location|null $location De coördinaten in het Rijksdriehoeksstelstel  - zie uitwerking hieronder
 * @property string $privateCode Hier definieert men het SID van de VRI.
Gebruik attribuut type=”KarAddress”.
 * @property TypeOfActivation $typeOfActivation Typering van het KAR-punt. 
De volgende typen worden onderscheiden:
  * Vooraanmelding (PreAnnouncement)
  * Aanmelding (Announcement)
  * Stopstreep (HaltLine)
  * Uitmelding (LeaveMessage)

De referentie verwijst naar de standaard BISON enumeratie.
Bijvoorbeeld: <TypeOfActivationRef ref="BISON:TypeOfActivation:HaltLine">
 */

class ActivationPoint extends Record {}