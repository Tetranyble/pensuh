<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')->unsigned()->nullable();
            $table->float('resumption_test',8,2);// same for primary school
            $table->float('note_score', 8, 2); //attendance or note for primary school
            $table->float('project_score', 8, 2);
            $table->float('classwork_score', 8, 2); // classwork or assignment in primary school
            $table->float('assigment_score', 8, 2)->nullable();
            $table->float('midterm_test_score', 8, 2);
            $table->float('attendance_score', 8, 2)->nullable();
            $table->float('exam_score', 8, 2);

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
        Schema::dropIfExists('grades');
    }
}
