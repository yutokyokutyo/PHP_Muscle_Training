<?php

function odekake() {
    $html  = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
    $lines = explode("\n", $html);
    $spots = 0;
    $hoge = [];

    foreach ($lines as $line) {
        $line = trim($line);
        if (strstr($line, '<p class="event"')) {
            $tags = ['<p class="event">', '</p>'];
            $spot = str_replace($tags, "", $line);
            print($spot."\n");
            array_push($hoge, $spot);
            $spots++;
            if ($spots === 3) {
                break;
            }
        }
    }
    return $hoge;
}


function testOdekake() {
    $spots =  odekake();
    if ($spots[0] === "エプソン アクアパーク品川") {
        print("Success!");
    } else {
        print("Failure!");
    }
}

testOdekake();
