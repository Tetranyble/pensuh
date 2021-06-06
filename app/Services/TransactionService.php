<?php

namespace App\Services;

use App\Transaction;

class TransactionService {
    public function create($response){
        return Transaction::create([
            'amount' => $response['data']['amount'],
            'reference' => $response['data']['reference'],
            'status' => $response['data']['status'],
            'currency' => $response['data']['currency'],
            'card_type' => $response['data']['authorization']['card_type'],
            'last4' => $response['data']['authorization']['last4'],
            'exp_month' => $response['data']['authorization']['exp_month'],
            'exp_year' => $response['data']['authorization']['exp_year'],
            'bank' => $response['data']['authorization']['bank'],
            'channel' => $response['data']['authorization']['channel'],
            'metadata' =>  json_encode($response['data']['metadata']),
            'email' => $response['data']['customer']['email'],
            'account_name' => $response['data']['authorization']['account_name'],
            'school_id' => auth()->user()->school->id,
            'ip_address' => $response['data']['ip_address'],
            'user_id' => auth()->user()->id,
            'reusable' => $response['data']['authorization']['reusable'],
            'authorization_code' => $response['data']['authorization']['authorization_code']
        ]);
    }

}
