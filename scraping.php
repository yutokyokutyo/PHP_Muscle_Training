<?php
$html  = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
$lines = explode("\n", $html);
$spots = 0;

foreach ($lines as $line) {
    $line = trim($line);
    if (strstr($line, '<p class="event"')) {
        $tags = ['<p class="event">', '</p>'];
        $spot = str_replace($tags, "", $line);
        print($spot."\n");
        $spots++;
        if ($spots === 3) {
            break;
        }
    }
}
