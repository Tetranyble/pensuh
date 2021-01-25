<?php

use App\Classes;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Section::create(['name' => 'v']);
        $class = Classes::create(['name' => 'JSS1', 'description' => 'Junior Secondary']);
        Section::create(['name' => 'A', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'B', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'C', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'D', 'capacity' => '50', 'classes_id' =>$class->id]);

        $class = Classes::create(['name' => 'JSS2', 'description' => 'Junior Secondary']);
        Section::create(['name' => 'A', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'B', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'C', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'D', 'capacity' => '50', 'classes_id' =>$class->id]);

        $class = Classes::create(['name' => 'JSS3', 'description' => 'Junior Secondary']);
        Section::create(['name' => 'A', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'B', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'C', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'D', 'capacity' => '50', 'classes_id' =>$class->id]);

        $class = Classes::create(['name' => 'SS1', 'description' => 'Junior Secondary']);
        Section::create(['name' => 'A', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'B', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'C', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'D', 'capacity' => '50', 'classes_id' =>$class->id]);

        $class = Classes::create(['name' => 'SS2', 'description' => 'Junior Secondary']);
        Section::create(['name' => 'A', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'B', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'C', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'D', 'capacity' => '50', 'classes_id' =>$class->id]);

        $class = Classes::create(['name' => 'SS3', 'description' => 'Junior Secondary']);
        Section::create(['name' => 'A', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'B', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'C', 'capacity' => '50', 'classes_id' =>$class->id]);
        Section::create(['name' => 'D', 'capacity' => '50', 'classes_id' =>$class->id]);
    }
}
