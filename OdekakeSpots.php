<?php
class OdekakeSpots
{
    public static function parseHtmlToArray() {
        $html  = file_get_contents('http://www.walkerplus.com/top/tokyo.html');
        $lines = explode("\n", $html);
        return $lines;
        // ネットが死んでたり、hostサーバが落ちてたらテストが落ちてしまう懸念有り
    }

    public static function getRanking() {
        $lines = self::parseHtmlToArray();
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

    public static function printOdekakeSpots() {
        $spots = self::getRanking();
        return implode("\n", $spots);
    }
}

// 実行するのはファイルを分けるべき
OdekakeSpots::getRanking();
