<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * NoticeAssignment model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * order
 *
 * @property Notice $notice Herbruikbare tekst die wordt toegewezen.
 * @property VersionOfObject $noticedObject Object waaraan de herbruikbare tekst wordt toegewezen.
Zet in attribuut nameOfRefClass het objecttype. Mogelijke typen zijn: Line, ScheduledStopPoint, ServiceJourney, xxxxxPointInJourneyPattern.
Bijvoorbeeld: 
    <NoticedObjectRef ref="CXX:Line:M004" nameOfRefClass="Line"/>
 */

class NoticeAssignment extends Record {}