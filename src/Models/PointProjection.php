<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * ScheduledStopPoint/projections/PointProjection model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * version
 *
 * @property string $id Technische identificatie
 * @property Point $projectToPoint Routepunt waaraan de logische halte is gekoppeld.
Gebruik hierbij altijd nameOfRefClass="RoutePoint".
Bijvoorbeeld:  <ProjectToPointRef nameOfRefClass="RoutePoint"
                                                       ref="CXX:RoutePoint:36002156"/>
 */

class PointProjection extends Record {}