<?php
$homepage = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
$array = explode("\n", $homepage);
$events = 0;
foreach ($array as $value) {
    $pos = strpos($value, '<p class="event"');
    if ($pos !== false) {
        $hoge = ['<p class="event">', '</p>'];
        $p_class = str_replace($hoge, "", $value);
        print(trim($p_class)."\n");
        $events++;
        if ($events === 3) {
            break;
        }
    }
}
