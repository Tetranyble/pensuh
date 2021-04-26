<?php

use App\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'established' => '2001',
            'language_id' => '1',
            'school_name' => 'Ph',
            'code' =>  time() + 1,
            'theme' => 'white',
            'address' => 'Egbema Ozubulu',
            'blog_banner' => 'storage/blogger.jpg',
            'work_time' => 'Mon - Fri 8 AM - 5 PM',
            'contact_phone' => '08063466490',
            'email' => 'info@peculiarschoolozubulu.com',
            'facebook_handle' => 'https://web.facebook.com/pensuhH',
            'twitter_handle' => 'https://twitter.com/pensuh',
            'instagram_handle' => 'https://www.instagram.com/pensuhh/',
            'school_logo' => 'storage/logo.png',
            'about_school' => 'Peculiar Group of School Ozubulu -The Smarter Way to Learn',
            'school_excerpt' => 'Manage and automate attendance, admission, assessment, payment, performance, generate report cards – all from one easy-to-use app.',
            'school_excerpt_header'=> 'The Smarter Way to Learn Anything',
            'school_welcome_header' => 'Welcome to Peculiar Group of School School',
            'school_welcome_body' => 'Peculiar Group of school is an automated school management software',
//            'school_latitude' => '',
//            'school_longitude' => '',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11224.078440232506!2d6.844190129284232!3d5.951817672298977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043bd28b4b0d209%3A0x586a92d8335d4c00!2sPeculiar%20Nursery%20and%20Primary%20School%2C%20Ozubulu!5e0!3m2!1sen!2sng!4v1618423917711!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

            'course_banner' => 'storage/classes-banner.jpg',
            'school_class_header' => 'Our Classes',
            'school_class_body' => 'our class schedule',
            'school_teacher_header' => 'Our Awesome Teachers',
            'school_teacher_body' => 'meet our awesome teachers',
            'school_news_header' => 'Recent News',
            'school_news_body' => 'Things happening in and around our school',
            'school_event_header' => 'Upcoming Events',
            'school_event_body' => 'check our awesome events',

            'teacher_support' => 'Awesome Teachers',
            'teacher_support_body' => 'Our teaching method is exceptional',
            'certificate_acceptance' => 'Global Certificate',
            'certificate_acceptance_body' => 'Our certificate well accepted',
            'program' => 'Best Programme',
            'program_body' => 'our programme is child focus',
            'support' => 'Student Support Service',
            'support_body' => 'Our school bus and paramedic support service is exceptional',
            'banner_image' => 'storage/banner-img.png',
            'event_image' => 'storage/course-img.jpg',

            'about_image' => 'storage/abt1.png',
            'mission_image' => 'storage/abt2.png',
            'mission_header' => 'Our Mission',
            'mission_body' =>  '<p>Our mission is to make learning:</p><ul><li>Simple</li><li>Flexible</li><li>Reliable</li><li>User friendly</li></ul>',
            'benefit_header' => 'Product Features',
            'benefit_body' => 'Peculiar Group of School is a Cloud based School Management Software System that combines all features necessary for running a modern Nursery, Primary, or Secondary school into one system that is simple, flexible, and reliable.',
        ]);
    }
}
