<?php
class OdekakeSpots
{
    const URL = 'http://www.walkerplus.com/top/tokyo.html';

    public static function parseHtmlToArray(string $url) {
        $html  = file_get_contents($url);
        $lines = explode("\n", $html);
        return $lines;
    }

    public static function getRanking(array $lines) {
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

    public static function printOdekakeSpots($url = self::URL) {
        $lines = OdekakeSpots::parseHtmlToArray($url);
        $spots = self::getRanking($lines);
        return implode("\n", $spots);
    }
}
