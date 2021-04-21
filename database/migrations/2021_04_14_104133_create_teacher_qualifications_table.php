<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_qualifications', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->unsigned()->nullable();
            $table->string('education')->default('unavailable')->nullable();
            $table->text('description')->default('unavailable')->nullable();
            $table->string('experience')->default('unavailable')->nullable();
            $table->integer('teaching')->default('0')->nullable();
            $table->integer('family_support')->default('0')->nullable();
            $table->integer('speaking')->default('0')->nullable();
            $table->integer('children_well_being')->default('0')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

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
        Schema::dropIfExists('teacher_qualifications');
    }
}
