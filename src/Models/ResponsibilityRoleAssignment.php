<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ResponsibilitySet/roles/ResponsibilityRoleAssignment model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string|null $dataRoleType De administratieve rol van de organisatie voor het 'gebied'.
Het veld kan meerdere waarden bevatten, gescheiden door spaties.
Mogelijke waarden: 
   "creates" = aanleveren van de gegevens (leverancier)
   "collects" = verzamelen van de gegevens (integrator)
   "aggregates" = verzamelen van de gegevens (integrator)
   "augments" = verrijken van de gegevens
   "validates" = controleren van de gegevens
   "distributes" = verspreiden van de gegevens
   "redistributes" = doorsturen van de gegevens
   "secures" = beveiligen van de gegevens
   "owns" = eigenaar van de gegevens
   "other" = andere rol
   "all" = alle rollen
In het NL NeTEx Profiel wordt dit veld vooralsnog niet gebruikt.
 * @property string|null $stakeholderRoleType De rol van de belanghebbende organisatie voor het 'gebied'.
Het veld kan meerdere waarden bevatten, gescheiden door spaties.
Mogelijke waarden: 
   "Planning" = maken van de dienstregeling (leverancier)
   "Reservation" = reserveringen beheren
   "Operation" = uitvoeren van de dienstregeling (uitvoerend vervoerder)
   "Control" = bewaken van de uitvoering
   "FareManagement" = tarieven beheren
   "SecurityManagement" = beveiliging van de gegevens
   "DataRegistrar" = standaarden beheren (BISON, DOVA)
   "EntityLegalOwnership" = formele eigenaar (concessieverlener, wegbeheerder)
   "Other" = andere rol
In het NL NeTEx Profiel wordt dit veld vooralsnog niet gebruikt.
 * @property TypeOfResponsibilityRole|null $typeOfResponsibilityRole De (andere) rol van de organisatie voor het 'gebied'.
De referentie verwijst naar een waarde uit de standaard lijst van BISON.
Vooralsnog alleen gebruikt voor de financier (type="financing").
Bijvoorbeeld:
  <TypeOfResponsibilityRoleRef ref="BISON:TypeOfResponsibilityRole:financing"/>
 * @property Organisation|null $responsibleOrganisation Verwijzing naar een organisatie, inclusief attribuut nameOfRefClass.
Dit kan een Authority, Operator of (andere) Organisation zijn.
Indien de organisatie voorkomt in een centrale lijst (van DOVA) wordt daarnaar verwezen. Zo niet, dan moet de organisatie in de levering zelf gedefinieerd worden.
 * @property VersionOfObject|null $responsibleArea Verwijzing naar een verzameling van elementen ('gebied'), inclusief attribuut nameOfRefClass="TransportAdministrativeZone".
De constraints op het NeTEx-xsd eisen dat er gerefereerd wordt aan een TransportAdministrativeZone! Voor koppeling aan andere elementtypen (bijv. GroupOfLines) is dus een tussenstap via dat ondersteunend element noodzakelijk. Deze TAZ moet in de levering zelf gedefinieerd worden.
 */

class ResponsibilityRoleAssignment extends Record {}