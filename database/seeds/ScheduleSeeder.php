<?php

use App\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'day' => 'monday',
            'start' => '8:05 PM',
            'end' => '8:50 PM'
        ]);

        Schedule::create([
            'day' => 'monday',
            'start' => '8:50 AM',
            'end' => '9:35 AM'
        ]);
        Schedule::create([
            'day' => 'monday',
            'start' => '9:35 AM',
            'end' => '10:20 AM'
        ]);
        Schedule::create([
            'day' => 'monday',
            'start' => '10:20 AM',
            'end' => '11:05 AM'
        ]);
        Schedule::create([
            'day' => 'monday',
            'start' => '11:05 AM',
            'end' => '11:50 AM'
        ]);
//        Schedule::create([
//            'day' => 'monday',
//            'start' => '11:50 AM',
//            'end' => '12:50 AM'
//        ]);
    }
}
