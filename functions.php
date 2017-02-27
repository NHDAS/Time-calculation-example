<?php
/**
 * Copyright 2017 網路假期 - 答案共享資料庫
 *
 * 用於計算資料提交於多久之前
 * https://github.com/NHDAS/Time-calculation-example
 */
function time_out($date){
    date_default_timezone_set("Asia/Taipei"); //設定時區為台北時區
    $today = getdate();
    date("Y-m-d"); //日期格式化
    $year = $today["year"]; //年
    $month = $today["mon"]; //月
    $day = $today["mday"]; //日
    $hours = $today["hours"]; //時
    $minutes = $today["minutes"]; //分
    $seconds = $today["seconds"]; //秒
    
    $time1 = $year."-".$month."-".$day." ".$hours.":".$minutes.":".$seconds;
    $time2 = $date;

    $total_second = (strtotime($time1) - strtotime($time2)); //計算相差之秒數

    if($total_second == 0){
        $time_out = "剛剛";
    }
    
    if($total_second > 0 && $total_second < 60){
        $time_out = $total_second." 秒前";
    }

    if($total_second >= 60 && $total_second < (60*60)) {
        $result = $total_second / 60;
        $time_out = intval($result)." 分鐘前";
    }
 
    if($total_second >= (60*60) && $total_second < (60*60*24)) {
        $result = $total_second / (60*60);
        $time_out = intval($result)." 小時前";
    }
 
    if($total_second >= (60*60*24)) {
        $time_out = $time2;
    }

    echo $time_out;
}
?>