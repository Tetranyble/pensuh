<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'name' => 'schools',
            'slug' => 'schools',
            'description' => 'schools'
        ]);

        Category::create([
            'name' => 'school news',
            'slug' => Str::slug('school news'),
            'description' => 'school news'
        ]);
         Category::create([
             'name' => 'teachers',
             'slug' => Str::slug('teachers'),
             'description' => 'teacher'
         ]);

          Category::create([
              'name' => 'lessons',
              'slug' => Str::slug('lessons'),
              'description' => 'lessons'
          ]);

           Category::create([
               'name' => 'pensuh',
               'slug' => Str::slug('pensuh'),
               'description' => 'pensuh'
           ]);
    }
}
