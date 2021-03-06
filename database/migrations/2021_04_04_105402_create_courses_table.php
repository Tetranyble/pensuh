<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('school_id')->unsigned()->nullable();
            $table->integer('course_type_id')->nullable();
            $table->text('body')->nullable();
            $table->string('grade_system_name')->nullable();
            $table->string('banner')->nullable()->default('school-1/class-single-banner.jpg');
            $table->string('photo')->nullable()->default('school-1/class1.jpg');
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
