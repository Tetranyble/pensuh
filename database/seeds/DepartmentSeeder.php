<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name' => 'Science', 'description' => 'core science courses']);
        Department::create(['name' => 'Arts', 'description' => 'core arts courses']);
        Department::create(['name' => 'Commercial', 'description' => 'commercial courses']);
        Department::create(['name' => 'Primary', 'description' => 'Primary Schools teachers']);
        Department::create(['name' => 'Nursery', 'description' => 'Nursery Schools teachers']);
        Department::create(['name' => 'Creche', 'description' => 'Creche Schools teachers']);
    }
}
