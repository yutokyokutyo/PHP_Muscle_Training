<?php

// classにまとめるぞ！
function parseHtmlToArray() {
    $html  = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
    $lines = explode("\n", $html);
    return $lines;
    // ネットが死んでたり、hostサーバが落ちてたらテストが落ちてしまう懸念有り
}

function odekakeSpots() {
    $lines = parseHtmlToArray();
    $spots = [];

    foreach ($lines as $line) {
        $line = trim($line);
        if (strstr($line, '<p class="event"')) {
            $tags = ['<p class="event">', '</p>'];
            $spot = str_replace($tags, "", $line);
            array_push($spots, $spot);
            if (count($spots) === 3) {
                break;
            }
        }
    }
    return $spots;
}

function printOdekakeSpots() {
    $spots = odekakeSpots();
    return implode("\n", $spots);
}


function testParseHtmlToArray() {
    $lines = parseHtmlToArray();
    # もしもarrayだったらOk
    if (is_array($lines)) {
        print("this is array!!\n");
    }
    # もしも配列の中にdoctypeが入ってたらok
    if (in_array('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">', $lines)) {
        print("this is html!!\n");
    }


}

function testOdekakeSpots() {
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
}

function testPrintOdekakeSpots() {
    $spots = printOdekakeSpots();
    if ($spots = "エプソン アクアパーク品川\n東京ソラマチ(R)\nJ-WORLD TOKYO%") {
        print("print ok!\n");
    }
}

testOdekakeSpots();
testParseHtmlToArray();
testPrintOdekakeSpots();
print printOdekakeSpots();

