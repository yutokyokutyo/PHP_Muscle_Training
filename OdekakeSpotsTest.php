<?php
require('./OdekakeSpots.php');

class OdekakeSpotsTest extends PHPUnit_Framework_TestCase
{
    public function testParseHtmlToArray()
    {
        $path = './WalkerPlusTest.html';
        $lines = OdekakeSpots::parseHtmlToArray($path);
        $this->assertInternalType('array', $lines);
        $this->assertEquals($lines[0], '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">');
    }

    public function testGetRanking()
    {
        $path = './WalkerPlusTest.html';
        $lines = OdekakeSpots::parseHtmlToArray($path);
        $spots = OdekakeSpots::getRanking($lines);

        $this->assertEquals($spots[0], "エプソン アクアパーク品川");
        $this->assertEquals($spots[1], "東京ソラマチ(R)");
        $this->assertEquals($spots[2], "三井アウトレットパーク 多摩南大沢");
    }

    public function testPrintOdekakeSpots()
    {
        $path = './WalkerPlusTest.html';
        $spots = OdekakeSpots::printOdekakeSpots($path);
        $this->assertEquals($spots, "エプソン アクアパーク品川\n東京ソラマチ(R)\n三井アウトレットパーク 多摩南大沢");
    }
}

