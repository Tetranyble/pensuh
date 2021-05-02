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
        //Category::truncate();
        Category::create([
            'name' => 'schools',
            'school_id' => '1',
            'slug' => 'schools',
            'description' => 'schools'
        ]);

        Category::create([
            'name' => 'school news',
            'school_id' => '1',
            'slug' => Str::slug('school news'),
            'description' => 'school news'
        ]);
         Category::create([
             'name' => 'teachers',
             'school_id' => '1',
             'slug' => Str::slug('teachers'),
             'description' => 'teacher'
         ]);

          Category::create([
              'name' => 'lessons',
              'school_id' => '1',
              'slug' => Str::slug('lessons'),
              'description' => 'lessons'
          ]);

           Category::create([
               'name' => 'pensuh',
               'school_id' => '1',
               'slug' => Str::slug('pensuh'),
               'description' => 'pensuh'
           ]);
    }
}
