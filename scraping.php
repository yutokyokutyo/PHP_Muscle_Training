<?php
$homepage = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
$array = explode("\n", $homepage);
foreach ($array as $value) {
    $pos = strpos($value, '<p class="event"');
    if ($pos !== false) {
        print($value);
    }
}
