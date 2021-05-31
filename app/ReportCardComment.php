<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ReportCardComment extends Model
{
    protected $fillable = ['comment', 'user_id', 'report_card_id', 'school_id', 'comment_by', 'role'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reportCard(){
        return $this->belongsTo(ReportCard::class);
    }
    public function commentBy(){
        return $this->belongsTo(User::class, 'comment_by');
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
