<?php
namespace App\Services\ReportCard;

use App\Grade;

class ReportCardCrecheSchool implements ReportCardInterface {
    public $grades;

    public function __construct(Grade $grades)
    {
        $this->grades = $grades;
    }


    public function termly()
    {
        // TODO: Implement termly() method.
    }

    public function annually()
    {
        // TODO: Implement annually() method.
    }
}
