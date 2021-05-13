<?php

namespace App\Observers;

use App\Grade;



class GradeObserver
{

    /**
     * Handle the grade "created" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function created(Grade $grade)
    {
        //
    }

    /**
     * Handle the grade "updated" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function updated(Grade $grade)
    {


        $total = 0;
//        $total += $grade->resumption_test;
//        $total += $grade->assignment;
//        $total += $grade->exam;
//        $total += $grade->classwork;
//        $total += $grade->midterm_test;
//        $total += $grade->attendance;
//        $total += $grade->project;
//        $total += $grade->note;
//        $grade->total = $total;
//        $grade->save();
        return true;
    }

    /**
     * Handle the grade "deleted" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function deleted(Grade $grade)
    {
        //
    }

    /**
     * Handle the grade "restored" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function restored(Grade $grade)
    {
        //
    }

    /**
     * Handle the grade "force deleted" event.
     *
     * @param  \App\Grade  $grade
     * @return void
     */
    public function forceDeleted(Grade $grade)
    {
        //
    }
}
