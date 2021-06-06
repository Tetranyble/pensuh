<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $casts = [
        'data' => 'array',
    ];
    protected $fillable = ['student_id', 'paid_by_id', 'school_id', 'transaction_id', 'data'];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function paidBy(){
        return $this->belongsTo(User::class, 'paid_by_id');
    }
    public function getDataAttribute($value){
        return json_decode($value);
    }
}
