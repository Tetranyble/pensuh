<?php

use App\AttendanceType;
use Illuminate\Database\Seeder;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendanceType::create(['name' => 'examination Attendance']);
        AttendanceType::create(['name' => 'child safety (arrived)']);
        AttendanceType::create(['name' => 'child safety (picked up)']);
        AttendanceType::create(['name' => 'staff signin']);
        AttendanceType::create(['name' => 'staff signout']);
        AttendanceType::create(['name' => 'morning attendance']);
        AttendanceType::create(['name' => 'afternoon attendance']);
        AttendanceType::create(['name' => 'class attendance']);
    }
}
