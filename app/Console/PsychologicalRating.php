<?php

namespace App\Console;

use App\School;
use Illuminate\Database\Eloquent\Model;

class PsychologicalRating extends Model
{
    protected $fillable = ['name', 'key', 'school_id'];

    public function school(){
        return $this->belongsTo(School::class);
    }
}
