<?php

use PHPUnit\Framework\TestCase;
use Wipkip\NeTEx\Database\NeTExDB;
use Wipkip\NeTEx\Parser\Parser;

class ParserTest extends TestCase
{

    public function testParser() {

        // Create Db
        $dbPath = tempnam(sys_get_temp_dir(), 'netex-') . '.db';
        $db = new NeTExDB($dbPath);

        // Create parser
//        $parser = new Parser(__DIR__ . '/xml/NeTEx_GVB_GVB_20211222T091000_20211222_20220131_prod_test.xml');
        $parser = new Parser(__DIR__ . '/xml/NeTEx_GVB_GVB_20210908T103100_20210901_20211031_acc_test.xml');
        $this->assertInstanceOf(Parser::class, $parser);

        $parser->import($db);

    }


}