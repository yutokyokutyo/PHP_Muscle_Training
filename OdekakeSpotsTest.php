<?php
require('./OdekakeSpots.php');


class OdekakeSpotsTest extends PHPUnit_Framework_TestCase
{
    public static function testParseHtmlToArray() {
        $lines = OdekakeSpots::parseHtmlToArray();
        # もしもarrayだったらOk
        if (is_array($lines)) {
            print("this is array!!\n");
        }
        # もしも配列の中にdoctypeが入ってたらok
        if (in_array('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">', $lines)) {
            print("this is html!!\n");
        }
    }

    public function testGetRanking() 
    {
        $spots = OdekakeSpots::getRanking();

        $this->assertEquals($spots[0], "エプソン アクアパーク品川");

        if ($spots[0] === "エプソン アクアパーク品川") {
            print("Success1!\n");
        } else {
            print("Failure1!\n");
        }
        if ($spots[1] === "J-WORLD TOKYO") {
            print("Success2!\n");
        } else {
            print("Failure2!\n");
        }
        if ($spots[2] === "三井アウトレットパーク 多摩南大沢") {
            print("Success3!\n");
        } else {
            print("Failure3!\n");
        }
    }

    public static function testPrintOdekakeSpots()
    {
        $spots = OdekakeSpots::printOdekakeSpots();
        if ($spots === "エプソン アクアパーク品川\nJ-WORLD TOKYO\n三井アウトレットパーク 多摩南大沢") {
            print("print ok!\n");
        }
    }
}

