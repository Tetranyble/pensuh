<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('work_time')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('email');
            $table->string('blog_banner')->default('storage/blogger.jpg')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('school_logo')->nullable();
            $table->text('about_school')->nullable();
            $table->string('school_excerpt')->nullable();
            $table->string('school_excerpt_header')->nullable();
            $table->string('school_welcome_header')->nullable();
            $table->string('school_welcome_body')->nullable();
            $table->text('map')->nullable()->default('');
            $table->string('course_banner')->nullable()->default('storage/classes-banner.jpg');
//            $table->string('school_longitude')->nullable();
//            $table->string('school_latitude')->nullable();
            $table->string('school_class_header')->nullable();
            $table->string('school_class_body')->nullable();
            $table->string('school_teacher_header')->nullable();
            $table->string('school_teacher_body')->nullable();
            $table->string('school_news_header')->nullable();
            $table->string('school_news_body')->nullable();
            $table->string('school_event_header')->nullable();
            $table->string('school_event_body')->nullable();

            $table->string('established')->default('')->nullable();
            $table->integer('teaching_language')->nullable();//bn,en
            $table->integer('code')->unique();
            $table->string('theme')->nullable()->nullable();
            $table->string('favicon')->nullable()->default('storage/school/favicon.icon');
            $table->string('school_colour')->nullable()->default('#ffffff');
            $table->string('school_name')->nullable()->default('pensuh');

            $table->string('teacher_support')->nullable();
            $table->string('teacher_support_body')->nullable();
            $table->string('certificate_acceptance')->nullable();
            $table->string('certificate_acceptance_body')->nullable();
            $table->string('program')->nullable();
            $table->string('program_body')->nullable();
            $table->string('support')->nullable();
            $table->string('support_body')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('event_image')->nullable();

            $table->string('about_image')->nullable();
            $table->string('mission_image')->nullable();
            $table->string('mission_header')->nullable();
            $table->text('mission_body')->nullable();
            $table->string('benefit_header')->nullable();
            $table->string('benefit_body')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
