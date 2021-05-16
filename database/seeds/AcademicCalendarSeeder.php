<?php

use App\AcademicCalendar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AcademicCalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicCalendar::create([
            'name' => 'second term academic calendar',
            'resumption' => Carbon::now()->format('Y-m-d'),
            'vacation' => Carbon::now()->format('Y-m-d'),
            'body' => 'the quick brown fox leap over the lazy dog',
            'active' =>1,
            'school_id' => 1,
            'session_id' =>1
        ]);
    }
}
