<?php
function fmTime($time) { 
    $rtime = date("m-d H:i",$time); 
    $htime = date("H:i",$time); 
     
    $time = time() - $time; 
 
    if ($time < 60) { 
        $str = '금방'; 
    } 
    elseif ($time < 60 * 60) { 
        $min = floor($time/60); 
        $str = $min.'분전에'; 
    } 
    elseif ($time < 60 * 60 * 24) { 
        $h = floor($time/(60*60)); 
        $str = $h.'시간전에'; 
    } 
    elseif ($time < 60 * 60 * 24 * 3) { 
        $d = floor($time/(60*60*24)); 
        if($d==1) 
           $str = '어제'; 
        else 
           $str = '어제그전날 '; 
    } 
    else { 
        $str = $rtime; 
    } 
    return $str; 
} 
?>