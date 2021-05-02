<?php

use App\CourseType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseType::truncate();
        CourseType::create([
            'name' => 'Elective',
            'school_id' => '1',
            'slug' => Str::lower(Str::slug('Elective')),
            'description' => 'Elective course'
        ]);
        CourseType::create([
            'name' => 'Core',
            'school_id' => '1',
            'slug' => Str::lower(Str::slug('Core')),
            'description' => 'Core course'
        ]);
        CourseType::create([
            'name' => 'Optional',
            'school_id' => '1',
            'slug' => Str::lower(Str::slug('Optional')),
            'description' => 'Optional course'
        ]);
    }
}
