<?php

$text = 'El próximo día 21//2019 se celebrará desde las 14 a las 15:30 horas el congreso de';
$string = 'desde las';
$string_end = 'horas';
try {
    $find=preg_match('/\d{2}\/\d{2}\/\d{4}/',$text,$date_text);
    $date_text=$find===1?implode(' ',$date_text):'';
    if(empty($date_text)){
        echo "incorrect format date";
        $date_text=date ( 'Y/m/d' );
    }
    $date_hour_text =trim( takeTextFrom($text, $string, true, $string_end));
    $dates=explode(" a las ",   (string)$date_hour_text);
    if(count($dates)===2){
        if(strlen($dates[0])<5) {
            $dates[0]=$dates[0].'00';
        }
        if(strlen($dates[1])<5) {
            $dates[0]=$dates[0].'00';
        }
        $date_time_1 = new DateTime($date_text . 'T' . $dates[0]);
        $date_time_2 = new DateTime($date_text . 'T' . $dates[1]);
        var_dump($dates, $date_text, $find, $date_time_1, $date_time_2);
    }
    else{
        //    preg_match_all('!\d+!',  $date_text, $matches);
        //    var_dump($matches);
        echo "incorrect format";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
/**
 * @param $string
 * @param $text_start
 * @param false $take_start
 * @param string $text_end
 * @return false|string
 * @throws Exception
 */
function takeTextFrom($string, $text_start, $take_start = false, $text_end = '')
{
    $len_text_start = $take_start ? strlen($text_start) : 0;
    $start_pos = strpos($string, $text_start) + $len_text_start;
    if (strpos($string, $text_start) !== false) {
        if (empty($text_end)) {
            return substr($string, $start_pos);
        } else {
            $end_pos = strpos($string, $text_end, $start_pos);
            if (strpos($string, $text_end, $start_pos) !== false) {
                return substr($string, $start_pos, $end_pos - $start_pos);
            } else {
                throw new Exception("incorrect string end, not found text '$text_end' in send string");
            }
        }
    } else {
        throw new Exception("incorrect string, not found text '$text_start' in send string");
    }
}