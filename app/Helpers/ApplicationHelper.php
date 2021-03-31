<?php

function getTimeFromDate($dateTime){
    if ($dateTime){
        return date("h:i A", strtotime($dateTime));
    }
    return '00 AM';
}

function money($amount, $sign = '#'){
    if ($amount){
        return $sign . ' ' .number_format($amount,2);
    }
    return $sign . ' ' .'0';
}
