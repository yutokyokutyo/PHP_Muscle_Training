<?php
class OdekakeSpots
{
    public static function parseHtmlToArray($path) {
        $html  = file_get_contents($path);
        $lines = explode("\n", $html);
        return $lines;
    }

    public static function getRanking($lines) {
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

    public static function printOdekakeSpots($path = '') {
        if ($path === '') {
            $path = 'http://www.walkerplus.com/top/tokyo.html';
        }
        $lines = OdekakeSpots::parseHtmlToArray($path);
        $spots = self::getRanking($lines);
        return implode("\n", $spots);
    }
}
