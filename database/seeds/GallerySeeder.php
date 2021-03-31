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
            'photo' => 'storage/gallery1.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery2.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery4.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery3.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery5.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery6.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery7.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery8.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery9.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery10.jpg',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
    }
}
