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
        Tag::truncate();
        Tag::create([
            'name' => 'schools',
            'slug' => 'schools',
            'description' => 'schools'
        ]);

        Tag::create([
            'name' => 'school news',
            'slug' => Str::slug('school news'),
            'description' => 'school news'
        ]);
        Tag::create([
            'name' => 'teachers',
            'slug' => Str::slug('teachers'),
            'description' => 'teacher'
        ]);

        Tag::create([
            'name' => 'lessons',
            'slug' => Str::slug('lessons'),
            'description' => 'lessons'
        ]);

        Tag::create([
            'name' => 'pensuh',
            'slug' => Str::slug('pensuh'),
            'description' => 'pensuh'
        ]);
        Tag::create([
            'name' => 'class',
            'slug' => Str::slug('class'),
            'description' => 'class'
        ]);
    }
}
