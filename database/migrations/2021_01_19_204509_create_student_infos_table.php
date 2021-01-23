<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            //$table->integer('student_id')->unsigned();
            $table->string('session')->nullable();
            $table->string('group')->nullable();
            $table->dateTime('birthday');
            $table->string('religion')->nullable();
            $table->string('father_name');
            $table->string('father_phone_number');
            $table->string('father_national_id')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_designation')->nullable();
            $table->integer('father_annual_income')->nullable();
            $table->string('mother_name');
            $table->string('mother_phone_number');
            $table->string('mother_national_id')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_designation')->nullable();
            $table->integer('mother_annual_income')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('student_infos');
    }
}
