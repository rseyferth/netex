<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * Route/pointsInSequence/PointOnRoute model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * id
 * version
 * order
 *
 * @property RoutePoint $routePoint De RoutePoints representeren een-op-een de ScheduledStopPoints en TimingPoints in het corresponderende ritpatroon.
 * @property RouteLink|null $onwardRouteLink De RouteLinks bevatten de vorm van de route tussen twee opeenvolgende RoutePoints, en evt. de KAR-punten die onderweg gepasseerd worden.
 */

class PointOnRoute extends Record {}