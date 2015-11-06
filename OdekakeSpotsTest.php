<?php
require('./OdekakeSpots.php');

class OdekakeSpotsTest
{
    public function testGetRanking
    {
    OdekakeSpots::GetRanking();

    $spots =  odekakeSpots();
    if ($spots[0] === "エプソン アクアパーク品川") {
        print("Success1!\n");
    } else {
        print("Failure1!\n");
    }
    if ($spots[1] === "東京ソラマチ(R)") {
        print("Success2!\n");
    } else {
        print("Failure2!\n");
    }
    if ($spots[2] === "J-WORLD TOKYO") {
        print("Success3!\n");
    } else {
        print("Failure3!\n");
    }
    testOdekakeSpots();
}
}
