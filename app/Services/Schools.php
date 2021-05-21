<?php

namespace App\Services;

use App\School;

class Schools {
    protected $school;
    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function id(){
        return $this->school->id;
    }

    public function school(){
        return $this->school;
    }
}
