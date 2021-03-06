<?php

use App\Nationality;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::create([
            'name' => 'Nigeria',
            'code' => 'NG',
            'school_id' => '1'
        ]);
        Nationality::create([
            'name' => 'Ghana',
            'code' => 'Gh',
            'school_id' => '1'
        ]);
        Nationality::create([
            'name' => 'Great Britain',
            'code' => 'GB'
        ]);
        Nationality::create([
            'name' => 'United States',
            'code' => 'US',
            'school_id' => '1'
        ]);
    }
}
