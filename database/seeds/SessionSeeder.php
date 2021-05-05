<?php

use App\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session::create(['name' => '2018/2019', 'school_id' => '1']);
        Session::create(['name' => '2019/2020', 'school_id' => '1']);
        Session::create(['name' => '2020/2021', 'school_id' => '1']);
        Session::create(['name' => '2021/2022', 'school_id' => '1']);
        Session::create(['name' => '2022/2023', 'school_id' => '1']);
        Session::create(['name' => '2023/2024', 'school_id' => '1']);
        Session::create(['name' => '2024/2025', 'school_id' => '1']);
        Session::create(['name' => '2025/2026', 'school_id' => '1']);
    }
}
