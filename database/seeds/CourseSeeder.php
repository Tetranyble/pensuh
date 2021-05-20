<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $physics = Course::create([
            'name' => 'Advance Physics',
            'section_id' => '1',
            'school_id' => '1',
            'course_type_id' => '1',
            'body' => 'Nunc at tincidunt nisl. Nullam fringilla quis odio vitae eleifend. Quisque sed mi erat. In hac habitasse platea dictumst. Vivamus mattis nunc quis turpis pretium sollicitudin. In eu semper justo. Phasellus facilisis hendrerit massa, sed auctor lacus convallis et. Vestibulum ac odio interdum, efficitur nisl ut, sollicitudin arcu. Donec commodo elementum tempus. In hac habitasse platea dictumst.',
            'photo' => 'school-1/class1.jpg',
            'banner' => 'school-1/class-single-banner.jpg',
            'duration' => '26 hours'
        ]);
        $physics->attachSchedule([4,5]);
        $physics->assignTeacherTo(2);

        $chemistry = Course::create([
            'name' => 'Analytical Chemistry',
            'section_id' => '7',
            'school_id' => '1',
            'course_type_id' => '1',
            'body' => 'Nunc at tincidunt nisl. Nullam fringilla quis odio vitae eleifend. Quisque sed mi erat. In hac habitasse platea dictumst. Vivamus mattis nunc quis turpis pretium sollicitudin. In eu semper justo. Phasellus facilisis hendrerit massa, sed auctor lacus convallis et. Vestibulum ac odio interdum, efficitur nisl ut, sollicitudin arcu. Donec commodo elementum tempus. In hac habitasse platea dictumst.',
            'photo' => 'school-1/class1.jpg',
            'banner' => 'school-1/class-single-banner.jpg',
            'duration' => '26 hours'
        ]);
        $chemistry->assignTeacherTo([2,4]);
        $chemistry->attachSchedule(1);
        $biology = Course::create([
            'name' => 'Biology',
            'section_id' => '4',
            'school_id' => '1',
            'course_type_id' => '1',
            'body' => 'Nunc at tincidunt nisl. Nullam fringilla quis odio vitae eleifend. Quisque sed mi erat. In hac habitasse platea dictumst. Vivamus mattis nunc quis turpis pretium sollicitudin. In eu semper justo. Phasellus facilisis hendrerit massa, sed auctor lacus convallis et. Vestibulum ac odio interdum, efficitur nisl ut, sollicitudin arcu. Donec commodo elementum tempus. In hac habitasse platea dictumst.',
            'photo' => 'school-1/class1.jpg',
            'banner' => 'school-1/class-single-banner.jpg',
            'duration' => '26 hours'
        ]);
        $biology->assignTeacherTo([2,3]);
        $biology->attachSchedule(2);

    }
}
