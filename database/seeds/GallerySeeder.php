<?php

use App\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::truncate();
        $school = \App\School::first();
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery1.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery2.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery4.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery3.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery5.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery6.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery7.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery8.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery9.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'school-1/gallery10.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
    }
}
