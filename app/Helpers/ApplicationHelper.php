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


function domain($host){
    $myhost = strtolower(trim($host));
    $count = substr_count($myhost, '.');
    if($count === 2){
        if(strlen(explode('.', $myhost)[1]) > 3) $myhost = explode('.', $myhost, 2)[1];
    } else if($count > 2){
        $myhost = domain(explode('.', $myhost, 2)[1]);
    }
    return $myhost;
}
