<?php namespace Wipkip\NeTEx\Parser;

use Closure;
use Wipkip\NeTEx\Store\Store;

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
     * @var Store
     */
    private $store;





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

    private $path;

    public function __construct($path)
    {

        // Create parser
        $this->path = $path;
        $this->fh = fopen($path,'r');
        $this->parser = xml_parser_create();

        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false); // Disable uppercasing.
        xml_parser_set_option($this->parser, XML_OPTION_SKIP_WHITE, 1);


        // Set handlers
        xml_set_element_handler($this->parser, [$this, 'startElement'], [$this, 'endElement']);
        xml_set_character_data_handler($this->parser, [$this, 'elementContent']);

    }


    /**
     * @param Store $store
     * @param bool|Closure $showProgressBar
     * @return void
     */
    public function import(Store $store, $showProgressBar = false) {

        // Localize
        $this->store = $store;

        // Progress?
        $size = filesize($this->path);
        if ($showProgressBar === true) fwrite(STDOUT, "Processing XML file of " . round($size / 1024 / 1024) . 'MB' . PHP_EOL);

        // Go through the whole tree.
        $cursor = 0;
        $buffer = 4096;
        while ($data = fread($this->fh, $buffer)) {
            $cursor += $buffer;
            if (!xml_parse($this->parser, $data, feof($this->fh))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($this->parser)),
                    xml_get_current_line_number($this->parser)));
            }

            if ($showProgressBar === true) {
                fwrite(STDOUT, "\r" . str_repeat(' ', 72) . "\r");
                fwrite(STDOUT, number_format(($cursor / $size) * 100, 1) . '%');
            } elseif (is_callable($showProgressBar)) {
                $showProgressBar(($cursor / $size) * 100);
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
            $recordClass = 'Wipkip\\NeTEx\\Models\\' . $name;
            if (!class_exists($recordClass)) $recordClass = Record::class;
            $rec = new $recordClass($name, $attrs);
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
        $str = trim($data);
        $this->currentElementData = empty($str) ? null : $str;

    }

    private function endElement($parser, $name) {

        // Closing a record?
        $rec = $this->record();
        $arrayName = count($this->currentRecordArrays) > 0 ? $this->currentRecordArrays[count($this->currentRecordArrays) - 1] : null;

        if ($rec && $rec->elementName == $name) {

            // Inside an array?
            if (!empty($this->currentRecordArrays)) {

                // Add the record in the array
                $i = count($this->currentRecords) - 2;
                $this->currentRecords[$i]->addRecord($arrayName, $rec, $this->currentFrameVersion);

            } else {

                // Save it
                $this->store->store($rec, $this->currentFrameVersion);

            }


            // Level down
            array_pop($this->currentRecords);

        }

        // Closing a record array?
        elseif ($arrayName == $name) {

            // Pop it off.
            array_pop($this->currentRecordArrays);

        }

        // Publication date?
        elseif ($name == 'PublicationTimestamp' && count($this->cursor) == 2) {
            $this->store->publicationTimestamp = $this->currentElementData;
        }

        // One level down.
        array_pop($this->cursor);

        // Set a value in the record?
        if ($rec) {

            // Set it
            $rec->setValue($this->currentElementData, $this->currentFrameVersion);

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