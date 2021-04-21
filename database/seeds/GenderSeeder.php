<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name' => 'Male'
        ]);
        Gender::create([
            'name' => 'Female'
        ]);
        Gender::create([
            'name' => 'Prefer not to say'
        ]);
    }
}