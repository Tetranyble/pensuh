<?php

use Illuminate\Support\Str;

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


function payStackCharge($payable){
    $chargePercent = 1.5;
    $maxFee = 2000;
    $maxChargeable = 150000;
    if ($payable < $maxChargeable){
        return ($payable * $chargePercent) /100;
    }else{
        return $maxFee;
    }
}
function payable($payables = []){
    $pays = [];
    foreach ($payables as $pay){
        array_push($pays, $pay->amount, payStackCharge($pay->amount));
    }
    return array_sum($pays);
}
function payAll($payables = []){
    $data = array();
    foreach ($payables as $pay){
        array_push($data, [$pay->name => $pay->amount, 'feeType' => $pay->schoolType->name]);
    }

}

function receiptAmount($amounts = []){
    $sum  = [];
    foreach ($amounts as $amount){
        array_push($sum, $amount['amount']);
    }
    return array_sum($sum);
}

function cardExpiry($class){
    $class = str_replace(' ', '', Str::lower($class));
    $classes = [ 6 => 'jss1',  5 => 'jss2', 4 => 'jss3', 3 => 'ss1', 2 => 'ss2', 1 => 'ss3' ];
    return array_search($class, $classes);
}



