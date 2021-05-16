<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
