<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * DayType/properties/PropertyOfDay model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * 
 *
 * @property string|null $daysOfWeek Eén of meer dagen van de week (Monday t/m Sunday) of Weekdays, Weekend. Default = Everyday.
 * @property string|null $weeksOfMonth Weeknummer (1-5) binnen een maand. Default = EveryWeek.
 * @property string|null $dayOfYear Specifieke dag + maand. Default = n.v.t.
 * @property string|null $holidayTypes Bijzondere dagen (o.a. SchoolDay, NotSchoolDay). Default = AnyDay.
 * @property string|null $seasons Jaargetijden (Spring, Summer, Autumn, Winter). Default = Perennially (het hele jaar).
 * @property string|null $tides Getijden (o.a. HighTide, LowTide). Default = AllTides.
 * @property string|null $dayEvent Evenementen (normalDay, marketDay, matchDay, eventDay). Default = n.v.t.
 * @property string|null $crowding Verwachte drukte (veryQuiet, quiet, normal, busy, veryBusy). Default = n.v.t.
 */

class PropertyOfDay extends Record {}