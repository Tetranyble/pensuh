<?php
namespace App\Services\ReportCard;

class ReportCardOutputer {

    protected $reportCard;

    public function __construct(ReportCardService $reportCard)
    {
        $this->reportCard = $reportCard;
    }

    public function download(){

    }
    public function primary(){

    }
}
