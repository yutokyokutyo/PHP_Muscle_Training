<?php
class OdekakeSpots
{
    public static function parseHtmlToArray($path) {
        // if 本番環境のとき, PHP 実行したとき
        $html  = file_get_contents($path);
        // else if テスト環境のとき, PHPUnit で実行したとき
        // local のhtmlをみる
        $lines = explode("\n", $html);
        return $lines;
        // ネットが死んでたり、hostサーバが落ちてたらテストが落ちてしまう懸念有り
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
