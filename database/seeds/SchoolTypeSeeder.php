<?php

use App\SchoolType;
use Illuminate\Database\Seeder;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolType::create([
            'name' => 'Secondary School',
            'description' => 'Secondary school'
        ]);
        SchoolType::create([
           'name' => 'Primary School',
           'description' => 'primary school'
        ]);
        SchoolType::create([
            'name' => 'Nursery School',
            'description' => 'nursery school'
        ]);
        SchoolType::create([
            'name' => 'Creche School',
            'description' => 'nursery school'
        ]);
    }
}
