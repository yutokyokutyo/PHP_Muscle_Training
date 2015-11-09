<?php
require('./OdekakeSpots.php');

class OdekakeSpotsTest extends PHPUnit_Framework_TestCase
{
    public function testParseHtmlToArray() {
        $lines = OdekakeSpots::parseHtmlToArray();
        # もしもarrayだったらOk
        if (is_array($lines)) {
            print("this is array!!\n");
        }
        # もしも配列の中にdoctypeが入ってたらHtmlであることをテストできるのでok
        $this->assertEquals($lines[0], '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">');
    }

    public function testGetRanking()
    {
        $spots = OdekakeSpots::getRanking();

        $this->assertEquals($spots[0], "エプソン アクアパーク品川");
        $this->assertEquals($spots[1], "三井アウトレットパーク 多摩南大沢");
        $this->assertEquals($spots[2], "J-WORLD TOKYO");
    }

    public static function testPrintOdekakeSpots()
    {
        $spots = OdekakeSpots::printOdekakeSpots();
        if ($spots === "エプソン アクアパーク品川\n三井アウトレットパーク 多摩南大沢\nJ-WORLD TOKYO") {
            print("print ok!\n");
        }
    }
}

