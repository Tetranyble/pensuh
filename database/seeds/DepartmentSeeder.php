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
        Department::create(['name' => 'Science', 'description' => 'core science courses','school_id' => '1']);
        Department::create(['name' => 'Arts', 'description' => 'core arts courses', 'school_id' => '1']);
        Department::create(['name' => 'Commercial', 'description' => 'commercial courses', 'school_id' => '1']);
        Department::create(['name' => 'Support', 'description' => 'support staff', 'school_id' => '1']);
        Department::create(['name' => 'Primary', 'description' => 'Primary Schools teachers', 'school_id' => '1']);
        Department::create(['name' => 'Nursery', 'description' => 'Nursery Schools teachers', 'school_id' => '1']);
        Department::create(['name' => 'Creche', 'description' => 'Creche Schools teachers', 'school_id' => '1']);
    }
}
