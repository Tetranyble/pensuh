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
        Course::create([
            'name' => 'Advance Physics',
            'teacher_id' => '1',
            'section_id' => '1',
            'course_type_id' => '1',
            'body' => 'Nunc at tincidunt nisl. Nullam fringilla quis odio vitae eleifend. Quisque sed mi erat. In hac habitasse platea dictumst. Vivamus mattis nunc quis turpis pretium sollicitudin. In eu semper justo. Phasellus facilisis hendrerit massa, sed auctor lacus convallis et. Vestibulum ac odio interdum, efficitur nisl ut, sollicitudin arcu. Donec commodo elementum tempus. In hac habitasse platea dictumst.',
            'photo' => 'storage/class1.jpg',
            'banner' => 'storage/class-single-banner.jpg',
            'duration' => '26 hours'
        ]);
        Course::create([
            'name' => 'Analytical Chemistry',
            'teacher_id' => '1',
            'section_id' => '7',
            'course_type_id' => '1',
            'body' => 'Nunc at tincidunt nisl. Nullam fringilla quis odio vitae eleifend. Quisque sed mi erat. In hac habitasse platea dictumst. Vivamus mattis nunc quis turpis pretium sollicitudin. In eu semper justo. Phasellus facilisis hendrerit massa, sed auctor lacus convallis et. Vestibulum ac odio interdum, efficitur nisl ut, sollicitudin arcu. Donec commodo elementum tempus. In hac habitasse platea dictumst.',
            'photo' => 'storage/class1.jpg',
            'banner' => 'storage/class-single-banner.jpg',
            'duration' => '26 hours'
        ]);
        Course::create([
            'name' => 'Chemistry',
            'teacher_id' => '1',
            'section_id' => '4',
            'course_type_id' => '1',
            'body' => 'Nunc at tincidunt nisl. Nullam fringilla quis odio vitae eleifend. Quisque sed mi erat. In hac habitasse platea dictumst. Vivamus mattis nunc quis turpis pretium sollicitudin. In eu semper justo. Phasellus facilisis hendrerit massa, sed auctor lacus convallis et. Vestibulum ac odio interdum, efficitur nisl ut, sollicitudin arcu. Donec commodo elementum tempus. In hac habitasse platea dictumst.',
            'photo' => 'storage/class1.jpg',
            'banner' => 'storage/class-single-banner.jpg',
            'duration' => '26 hours'
        ]);
    }
}
