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
            $table->float('resumption_test',8,2);// same for primary school
            $table->float('note', 8, 2); //attendance or note for primary school
            $table->float('project', 8, 2);
            $table->float('classwork', 8, 2); // classwork or assignment in primary school
            $table->float('assignment', 8, 2)->nullable();
            $table->float('midterm_test', 8, 2);
            $table->float('attendance', 8, 2)->nullable();
            $table->float('exam', 8, 2);
            $table->float('total', 8, 2)->nullable();
            $table->float('position', 8, 2)->nullable();
            $table->float('average', 8, 2)->nullable();
            $table->string('grade')->default('F')->nullable();

            $table->bigInteger('school_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->integer('exam_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('report_card_id')->unsigned()->nullable();
            $table->string('remark')->default('')->nullable();
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
