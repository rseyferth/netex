<?php
namespace Wipkip\NeTEx\Models;
use Wipkip\NeTEx\Parser\Record;

/**$
 * RoutePoint model class
 *
 * This class was automatically generated based on the definitions XLSX
 *
 * Van een routepunt, dat correspondeert met een halte, mag de positie (enigszins) afwijken van de ‘echte’ locatie van de halte, die is vastgelegd in het ScheduledStopPoint. 
Door vanuit werkelijke positie van de halte (op basis van de x,y uit het CHB) een loodrechte projectie op de geografische route over de weg te maken kan de RoutePoint positie worden bepaald.  
Op basis van deze RoutePoints ontstaat een (vloeiende) weergave van de geografische route, die niet wordt beïnvloed door de precieze ligging van de halten t.o.v. de weg.
 * id
 * version
 *
 * @property Location|null $location De coördinaten in het Rijksdriehoeksstelstel  - zie uitwerking hieronder
 */

class RoutePoint extends Record {}