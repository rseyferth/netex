<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DataSource model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 *
 * @property string $name De naam van de gegevensbron, door de leverancier te bepalen.
T.b.v. eventuele controles op het leveringsproces en de communicatie hierover is het handig om vaste namen te gebruiken, die ook bij de ontvanger bekend zijn.
 * @property string $shortName Afkorting van de Name, die bijvoorbeeld ook past in een bestandsnaam.
Deze afkorting wordt ook gebruikt als ParticipantRef van een gegevenslevering.
 * @property string|null $description Een korte beschrijving van de gegevensbron.
 * @property string|null $email Het contactadres m.b.t. de gegevensleveringen.
 */

class DataSource extends Record {}