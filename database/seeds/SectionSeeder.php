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
        $class = Classes::whereName('SS 1')->first();
        Section::create(['name' => 'A', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 200','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'B', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'Ground Floor Room 600','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'C', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 300','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'D', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);

        $class = Classes::whereName('SS 2')->first();
        Section::create(['name' => 'A', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 400','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'B', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'Ground Floor Room 600','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'C', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 300','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'D', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);

        $class = Classes::whereName('SS 3')->first();
        Section::create(['name' => 'A', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'B', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'Ground Floor Room 600','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'C', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 300','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'D', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);

        $class = Classes::whereName('JSS 1')->first();
        Section::create(['name' => 'A', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 700','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'B', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'Ground Floor Room 600','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'C', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 300','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'D', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);

        $class = Classes::whereName('JSS 2')->first();
        Section::create(['name' => 'A', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 800','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'B', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'Ground Floor Room 600','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'C', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 300','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'D', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);

        $class = Classes::whereName('JSS 3')->first();
        Section::create(['name' => 'A', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 500','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'B', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'Ground Floor Room 600','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'C', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 300','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
        Section::create(['name' => 'D', 'capacity' => '50 Students', 'classes_id' =>$class->id, 'classroom' => 'First Floor Room 100','school_id' => '1', 'form_teacher' => '1'])->assignClassTeacher(1);
    }
}
