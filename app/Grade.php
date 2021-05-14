<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $guarded = [];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the course record associated with the user.
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    /**
     * Get the student record associated with the user.
     */
    public function student()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the teacher record associated with the user.
     */
    public function teacher()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the exam name record associated with the exam.
     */
    public function examination()
    {
        return $this->belongsTo('App\Exam', 'exam_id');
    }
}
