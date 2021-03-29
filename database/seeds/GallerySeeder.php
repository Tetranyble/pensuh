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
            'photo' => 'storage/gallery1.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery2.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery4.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery3.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery5.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery6.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery7.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery8.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery9.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
        Gallery::create([
            'school_id' => $school->id,
            'photo' => 'storage/gallery10.png',
            'name' => 'pensuh children week',
            'description' => 'event celebrate with peculiar group of school',
        ]);
    }
}
