<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * PassengerStopAssignment model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Let op: Wanneer de PassengerStopAssignment van een halte verandert (bijv. in een delta-levering), geldt dit voor alle lijnen die van de halte gebruik maken! 
Wanneer in een omleiding een fysiek andere halte wordt aangedaan moet men dus een nieuw ScheduledStopPoint definiëren i.p.v. de bestaande logische halte te koppelen aan een andere Quay in het CHB.
 * id
 * version
 * order
 * Kies één van de volgende twee varianten:
 *
 * @property string|null $name Een korte omschrijving van de halte, analoog aan de quayname in het CHB.
 * @property ScheduledStopPoint $scheduledStopPoint De logische halte in de dienstregeling.
 * @property StopPlace $stopPlace Het bijbehorende haltecluster.
De referentie is gebaseerd op de stopplacecode van een StopPlace in het CHB.
Bijvoorbeeld:  <StopPlaceRef ref="CHB:StopPlace:54447710"/>
       in het CHB: <stopplacecode>NL:S:54447710</stopplacecode>
 * @property Quay $quay De bijbehorende fysieke halte.
De referentie is gebaseerd op de quaycode van een Quay in het CHB.
Bijvoorbeeld:  <QuayRef ref="CHB:Quay:32002614"/>
       in het CHB: <quaycode>NL:Q:32002614</quaycode>
Bij dynamisch spoor/perrontoewijzing wordt het (voorkeur)perron opgenomen.
 */

class PassengerStopAssignment extends Record {}