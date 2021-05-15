<?php
namespace App\Services\ReportCard;

class ReportCardService {
    protected $reportCard;
    public function __construct(ReportCardInterface $reportCard)
    {
        $this->reportCard = $this->reportCard;
    }

    public function term()
    {
        if (is_a($this->reportCard, 'ReportCardInterface')) {
           return $this->reportCard->termly();
        }
        // consider throwing exception here
    }

    public function annual()
    {
        if (is_a($this->reportCard, 'ReportCardInterface')) {
            return $this->reportCard->annually();
        }
        // consider throwing exception here
    }

    public function generateRoprts($grades)
    {
    }
}
