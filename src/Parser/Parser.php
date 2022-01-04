<?php namespace Wipkip\NeTEx\Parser;

use Wipkip\NeTEx\Database\NeTExDB;

class Parser
{

    static $elementMap = [

        // Structure
        'TariffZone', 'Authority', 'Network', 'TransportAdministrativeZone',

        // Base
        'Version',
        'DataSource', 'ResponsibilitySet', 'Operator',
        'OperationalContext', 'VehicleType', 'Vehicle',
        'GaragePoint',

        // Routes
        'RoutePoint', 'RouteLink', 'Route',

        'Line', 'DestinationDisplay', 'ScheduledStopPoint', 'StopArea', 'PassengerStopAssignment',

        'TimingLink', 'ServiceJourneyPattern', 'TimeDemandType',

        'Notice', 'NoticeAssignment',



        /////////////////////
        // Timetable frame //
        /////////////////////

        'AvailabilityCondition', 'ServiceJourney', 'DeadRun',


        ////////////////////////////
        // Service calendar frame //
        ////////////////////////////

        'DayType', 'DayTypeAssignment',


        ////////////////////////////
        // Vehicle schedule frame //
        ////////////////////////////

        'Block',


    ];


    /**
     * @var resource
     */
    private $fh;

    /**
     * @var resource
     */
    private $parser;



    /**
     * @var NeTExDB
     */
    private $db;





    private $cursor = [];

    /**
     * @var Record[]
     */
    private $currentRecords = [];

    private $currentRecordArrays = [];


    /**
     * @var string
     */
    private $currentFrameId;

    /**
     * @var string
     */
    private $currentFrameVersion;
    /**
     * @var string
     */
    private $currentElementData;

    public function __construct($path)
    {

        // Create parser
        $this->fh = fopen($path,'r');
        $this->parser = xml_parser_create();

        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false); // Disable uppercasing.
        xml_parser_set_option($this->parser, XML_OPTION_SKIP_WHITE, 1);


        // Set handlers
        xml_set_element_handler($this->parser, [$this, 'startElement'], [$this, 'endElement']);
        xml_set_character_data_handler($this->parser, [$this, 'elementContent']);

    }


    public function import(NeTExDB $db) {

        // Localize
        $this->db = $db;

        // Go through the whole tree.
        while ($data = fread($this->fh, 4096)) {
            if (!xml_parse($this->parser, $data, feof($this->fh))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($this->parser)),
                    xml_get_current_line_number($this->parser)));
            }
        }
        xml_parser_free($this->parser);

    }


    private function startElement($parser, $name, $attrs)
    {

        // Entering a frame?
        if (preg_match('/^(Composite|Resource|Infrastructure|Service|Timetable|ServiceCalendar|VehicleSchedule)Frame$/', $name)
            && array_key_exists('id', $attrs)
            && array_key_exists('version', $attrs)) {
            $this->currentFrameId = $attrs['id'];
            $this->currentFrameVersion = $attrs['version'];
        }

        // Entering an element we want to store? (Either one of the root elements, or a nested element)
        if ((in_array($name, static::$elementMap) && empty($this->currentRecords)) || (
                !empty($this->currentRecordArrays) && count($this->currentRecords) == count($this->currentRecordArrays)
            )) {

            // Open a record
            $rec = new Record($name, $attrs);
            $this->currentRecords[] = $rec;

        }

        // Entering an array inside a record?
        elseif (preg_match('/^[a-z]/', $name) && !preg_match('/^([a-z]+):/', $name) && count($this->currentRecords) > 0) {

            // Enter into it.
            $this->currentRecordArrays[] = $name;
            $this->record()->createSet($name);

        }


        // Something inside an active record?
        elseif (!empty($this->currentRecords)) {

            // Add this to the context
            $this->record()->pushCursor([
                $name, $attrs
            ]);

        }

        // Store this element in the context for my children
        $this->cursor[] = [
            $name, $attrs
        ];
    }

    private function elementContent($parser, $data) {

        // Set it.
        $this->currentElementData = trim($data);

    }

    private function endElement($parser, $name) {

        // Closing a record?
        $rec = $this->record();
        $arrayName = $this->currentRecordArrays[count($this->currentRecordArrays) - 1];

        if ($rec && $rec->elementName == $name) {

            // Inside an array?
            if (!empty($this->currentRecordArrays)) {

                // Add the record in the array
                $i = count($this->currentRecords) - 2;
                $this->currentRecords[$i]->addRecord($arrayName, $rec);

            } else {

                // @TODO Store the record.
                if ($name == 'ServiceJourney') $rec->dd();

            }


            // Level down
            array_pop($this->currentRecords);

        }

        // Closing a record array?
        elseif ($arrayName == $name) {

            // Pop it off.
            array_pop($this->currentRecordArrays);

        }

        // One level down.
        array_pop($this->cursor);

        // Set a value in the record?
        if ($rec) {

            // Set it
            $rec->setValue($this->currentElementData);

            // Close the element
            $rec->popCursor();
        }

    }


    /**
     * @return Record|null
     */
    private function record() {
        $cnt = count($this->currentRecords);
        return $cnt == 0 ? null : $this->currentRecords[$cnt - 1];
    }

}