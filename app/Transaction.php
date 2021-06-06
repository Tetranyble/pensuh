<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $casts = [
        'metadata' => 'array',
    ];
    protected $fillable = ['amount', 'reference', 'status', 'currency', 'email','card_type', 'last4', 'exp_month', 'exp_year', 'bank', 'channel', 'metadata', 'account_name', 'school_id','ip_address', 'user_id', 'reusable', 'authorization_code'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function school(){
        return $this->belongsTo(School::class);
    }
}
