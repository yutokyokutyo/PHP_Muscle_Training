<?php

function odekakeSpots() {
    $html  = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
    $lines = explode("\n", $html);
    $spots = [];

    foreach ($lines as $line) {
        $line = trim($line);
        if (strstr($line, '<p class="event"')) {
            $tags = ['<p class="event">', '</p>'];
            $spot = str_replace($tags, "", $line);
            print($spot."\n");
            array_push($spots, $spot);
            if (count($spots) === 3) {
                break;
            }
        }
    }
    return $spots;
}


function testOdekakeSpots() {
    $spots =  odekakeSpots();
    if ($spots[0] === "エプソン アクアパーク品川") {
        print("Success1!");
    } else {
        print("Failure1!");
    }
    if ($spots[1] === "東京ソラマチ(R)") {
        print("Success2!");
    } else {
        print("Failure2!");
    }
    if ($spots[2] === "J-WORLD TOKYO") {
        print("Success3!");
    } else {
        print("Failure3!");
    }
}

testOdekakeSpots();
