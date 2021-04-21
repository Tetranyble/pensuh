<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
           'name' => 'English',
           'code' =>  "en-GB"
        ]);
        Language::create([
            'name' => 'English',
            'code' =>  "en-US"
        ]);
    }
}
