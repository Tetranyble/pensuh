<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tag::truncate();
        Tag::create([
            'name' => 'schools',
            'slug' => 'schools',
            'school_id' => '1',
            'description' => 'schools'
        ]);

        Tag::create([
            'name' => 'school news',
            'slug' => Str::slug('school news'),
            'school_id' => '1',
            'description' => 'school news'
        ]);
        Tag::create([
            'name' => 'teachers',
            'slug' => Str::slug('teachers'),
            'school_id' => '1',
            'description' => 'teacher'
        ]);

        Tag::create([
            'name' => 'lessons',
            'slug' => Str::slug('lessons'),
            'school_id' => '1',
            'description' => 'lessons'
        ]);

        Tag::create([
            'name' => 'pensuh',
            'slug' => Str::slug('pensuh'),
            'school_id' => '1',
            'description' => 'pensuh'
        ]);
        Tag::create([
            'name' => 'class',
            'slug' => Str::slug('class'),
            'school_id' => '1',
            'description' => 'class'
        ]);
    }
}
