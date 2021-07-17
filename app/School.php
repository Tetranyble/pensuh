<?php

namespace App;

use App\Console\PsychologicalRating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{

    use SoftDeletes;

    protected $fillable = ['alias', 'benefit_body', 'benefit_header', 'mission_body', 'mission_header', 'mission_image', 'about_image', 'event_image', 'banner_image', 'support_body',
        'support', 'program_body', 'program', 'certificate_acceptance_body', 'certificate_acceptance', 'teacher_support_body', 'teacher_support', 'school_name', 'school_colour',
        'favicon', 'theme', 'code', 'language_id', 'established', 'school_event_body', 'school_event_header', 'school_news_body', 'school_news_header', 'school_teacher_body',
        'school_teacher_header', 'school_class_body', 'school_class_header', 'course_banner', 'map', 'school_welcome_body', 'school_welcome_header', 'school_excerpt_header',
        'school_excerpt', 'about_school', 'school_logo', 'instagram_handle', 'twitter_handle', 'facebook_handle', 'blog_banner', 'email', 'contact_phone', 'work_time', 'school_name_code',
        'address', 'merchant_email', 'secret_key', 'public_key', 'vendor', 'result_school_name', 'result_logo'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function setCodeAttribute($value){
        $code = time();
        while(School::whereCode($code)->exists())
        {
            $code = time();
        }
        $this->attributes['code'] = $code;
    }

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function admin(){
        //return $this->users()->map->whereHas('roles',function ($q){$q->where('slug', 'admin')->orWhere('slug', 'principal');})->first();

    }
    public function psychometric(){
        return $this->hasMany(PsychologicalRating::class);
    }
    public function domains(){
        return $this->hasMany(Domain::class);
    }
}
