<?php

use App\Syllabus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SyllabusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Syllabus::create([
            'name' => 'JSS 1 Scheme of Works',
            'slug' => Str::slug('JSS 1 Scheme of Works'),
            'body' => '<p> JSS 1 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'JSS 2 Scheme of Works',
            'slug' => Str::slug('JSS 2 Scheme of Works'),
            'body' => '<p> JSS 2 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'JSS 3 Scheme of Works',
            'slug' => Str::slug('JSS 3 Scheme of Works'),
            'body' => '<p> JSS 3 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'SS 1 Scheme of Works',
            'slug' => Str::slug('SS 1 Scheme of Works'),
            'body' => '<p> SS 1 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'SS 2 Scheme of Works',
            'slug' => Str::slug('SS 2 Scheme of Works'),
            'body' => '<p> SS 2 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'SS 3 Scheme of Works',
            'slug' => Str::slug('SS 3 Scheme of Works'),
            'body' => '<p> SS 3 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Primary 1 Scheme of Works',
            'slug' => Str::slug('Primary 1 Scheme of Works'),
            'body' => '<p> Primary 1 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Primary 2 Scheme of Works',
            'slug' => Str::slug('Primary 2 Scheme of Works'),
            'body' => '<p> Primary 2 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Primary 3 Scheme of Works',
            'slug' => Str::slug('Primary 3 Scheme of Works'),
            'body' => '<p> Primary 3 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Primary 4 Scheme of Works',
            'slug' => Str::slug('Primary 4 Scheme of Works'),
            'body' => '<p> Primary 4 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Primary 5 Scheme of Works',
            'slug' => Str::slug('Primary 5 Scheme of Works'),
            'body' => '<p> Primary 5 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Primary 6 Scheme of Works',
            'slug' => Str::slug('Primary 6 Scheme of Works'),
            'body' => '<p> Primary 6 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Nursery 1 Scheme of Works',
            'slug' => Str::slug('Nursery 1 Scheme of Works'),
            'body' => '<p> Nursery 1 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Nursery 2 Scheme of Works',
            'slug' => Str::slug('Nursery 2 Scheme of Works'),
            'body' => '<p> Nursery 2 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Nursery 3 Scheme of Works',
            'slug' => Str::slug('Nursery 3 Scheme of Works'),
            'body' => '<p> Nursery 3 Scheme of Works</p>'
        ]);
        Syllabus::create([
            'name' => 'Creche Scheme of Works',
            'slug' => Str::slug('Creche Scheme of Works'),
            'body' => '<p> Creche Scheme of Works</p>'
        ]);
    }
}
