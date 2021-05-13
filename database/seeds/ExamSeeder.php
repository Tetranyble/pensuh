<?php

use App\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::create([
            'name' => 'first term exam',
            'active' => '1',
            'notice_published' => '1',
            'result_published' => '0',
            'school_id' => '1',
            'user_id' => '1'
        ]);
    }
}
