<?php

use App\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();
        Event::create([
            'school_id' => 1,
            'slug' => Str::slug('Pensuh school inter house sport week'),
            'name' => 'Pensuh school inter house sport week',
            'excerpt' => ' school inter house sport week',
            'body' => 'Organizing your school Inter House sports competition is like organizing a Mini Olympic games. It is time to impress the parents and make them feel proud of their children\'s school.',
            'location' => '14 stadium road Elekahia port harcourt',
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d992.0768131556866!2d6.847625129228582!3d5.952335083604819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043bd28b4b0d209%3A0x586a92d8335d4c00!2sPeculiar%20Nursery%20and%20Primary%20School%2C%20Ozubulu!5e0!3m2!1sen!2sng!4v1617175652942!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

            'host_id' => '1',
            'price' => '3000',
            'photo' => 'school-1/gallery1.jpg',
            'user_id' => '1'
        ]);

        Event::create([
            'school_id' => 1,
            'slug' => Str::slug('Pensuh school inter house sport week'),
            'name' => 'Pensuh school inter house sport week',
            'excerpt' => ' school inter house sport week',
            'body' => 'Organizing your school Inter House sports competition is like organizing a Mini Olympic games. It is time to impress the parents and make them feel proud of their children\'s school.',
            'location' => '14 stadium road Elekahia port harcourt',
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d992.0768131556866!2d6.847625129228582!3d5.952335083604819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043bd28b4b0d209%3A0x586a92d8335d4c00!2sPeculiar%20Nursery%20and%20Primary%20School%2C%20Ozubulu!5e0!3m2!1sen!2sng!4v1617175652942!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

            'host_id' => '1',
            'price' => '3000',
            'photo' => 'school-1/gallery1.jpg',
            'user_id' => '1'
        ]);
        Event::create([
            'school_id' => 1,
            'slug' => Str::slug('Pensuh school inter house sport week'),
            'name' => 'Pensuh school inter house sport week',
            'excerpt' => ' school inter house sport week',
            'body' => 'Organizing your school Inter House sports competition is like organizing a Mini Olympic games. It is time to impress the parents and make them feel proud of their children\'s school.',
            'location' => '14 stadium road Elekahia port harcourt',
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d992.0768131556866!2d6.847625129228582!3d5.952335083604819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043bd28b4b0d209%3A0x586a92d8335d4c00!2sPeculiar%20Nursery%20and%20Primary%20School%2C%20Ozubulu!5e0!3m2!1sen!2sng!4v1617175652942!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

            'host_id' => '1',
            'price' => '3000',
            'photo' => 'school-1/gallery1.jpg',
            'user_id' => '1'
        ]);
    }
}
