<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportCardComment extends Model
{
    protected $fillable = ['comment', 'user_id', 'report_card_id', 'school_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reportCard(){
        return $this->belongsTo(ReportCard::class);
    }
}
