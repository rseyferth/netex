<?php

use PHPUnit\Framework\TestCase;
use Wipkip\NeTEx\Parser\Record;
use Wipkip\NeTEx\Store\MemoryStore;
use Wipkip\NeTEx\Store\SQLiteStore;
use Wipkip\NeTEx\Parser\Parser;

class ParserTest extends TestCase
{


    public function testHTMTestSet() {

        // Store in memory
        $store = new MemoryStore();

        // Create parser
        $parser = new Parser(__DIR__ . '/xml/NeTEx_HTM_test_20210301.xml');
        $this->assertInstanceOf(Parser::class, $parser);

        // Parse it
        $parser->import($store, true);
        $this->assertEquals(8040, $store->count(), 'The number of records was incorrect');


        ////////////////////////
        // Retrieval and refs //
        ////////////////////////

        // Get a record
        $id = 'HTM:Block:129681:607';
        $version = '_2021-03-01';
        $rec = $store->get($id, $version,true);

        $this->assertInstanceOf(Record::class, $rec, 'Could not retrieve record ' . $id);
        $this->assertEquals('Block', $rec->elementName);
        $this->assertEquals($id, $rec->getId());

        // Make sure references are resolved
        $this->assertInstanceOf(Record::class, $rec->vehicleType, 'The vehicleType reference was not properly resolved');
        $this->assertEquals('VehicleType', $rec->vehicleType->elementName);

        $this->assertIsArray($rec->journeys);
        $this->assertCount(27, $rec->journeys);
        $this->assertInstanceOf(Record::class, $rec->journeys[0]);
        $this->assertEquals('DeadRun', $rec->journeys[0]->elementName);

        /** @var Record $journey */
        $journey = $rec->journeys[1];
        $this->assertInstanceOf(Record::class, $journey);
        $this->assertEquals('ServiceJourney', $journey->elementName);

        $this->assertInstanceOf(Record::class, $journey->serviceJourneyPattern);
        $this->assertIsArray($journey->serviceJourneyPattern->pointsInSequence);
        $this->assertCount(7, $journey->serviceJourneyPattern->pointsInSequence);

        /** @var Record $point */
        $point = $journey->serviceJourneyPattern->pointsInSequence[0];
        $this->assertInstanceOf(Record::class, $point);
        $this->assertEquals('StopPointInJourneyPattern', $point->elementName);

        $this->assertInstanceOf(Record::class, $point->scheduledStopPoint, 'References in nested objects were not properly resolved');



        /////////////////////////////////
        // Versions and record casting //
        /////////////////////////////////

        $versions = $store->getVersions();
        $this->assertCount(1, $versions);
        $version = $versions[0];
        $blocks = $version->blocks();
        $this->assertIsArray($blocks);
        $this->assertCount(120, $blocks);

        $block = $blocks[0];
        $this->assertInstanceOf(Record::class, $block);
        $this->assertEquals('Block', $block->elementName);
        $this->assertNull($block->vehicleType);
        $this->assertFalse($block->isResolved());

        // Resolve the references
        $_block = $block->resolveReferences($store);
        $this->assertTrue($_block->isResolved());
        $this->assertInstanceOf(Record::class, $_block->vehicleType);
        $this->assertEquals('VehicleType', $_block->vehicleType->elementName);

    }



}