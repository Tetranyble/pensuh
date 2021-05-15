<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_id');
            $table->bigInteger('student_id');
            $table->bigInteger('exam_id');
            $table->bigInteger('section_id');
            $table->bigInteger('user_id')->nullable(); //user who genrated the report
            $table->bigInteger('academic_calendar_id');
            $table->float('total',8,2)->default(0)->nullable();
            $table->float('average',8,2)->default(0)->nullable();
            $table->float('position',8,2)->default(0)->nullable();

            $table->integer('punctuality')->default(0)->nullable();//general
            $table->integer('attendance')->default(0)->nullable();//general
            $table->integer('attentiveness')->default(0)->nullable();//general
            $table->integer('initiative')->default(0)->nullable();//general
            $table->integer('perseverance')->default(0)->nullable();
            $table->integer('carrying_out_assignment')->default(0)->nullable();//general
            $table->integer('organisational_ability')->default(0)->nullable();
            $table->integer('neatness')->default(0)->nullable();//general
            $table->integer('politeness')->default(0)->nullable();//politeness
            $table->integer('honesty')->default(0)->nullable();//honesty
            $table->integer('self_control')->default(0)->nullable();//general
            $table->integer('spirit_of_cooperation')->default(0)->nullable();
            $table->integer('obedience')->default(0)->nullable();//general
            $table->integer('sense_of_responsibility')->default(0)->nullable();//general
            $table->integer('public_speaking')->default(0)->nullable();

            $table->integer('handwriting')->default(0)->nullable();
            $table->integer('handling_of_tools')->default(0)->nullable();
            $table->integer('drawing')->default(0)->nullable();
            $table->integer('painting')->default(0)->nullable();
            $table->integer('sculpture')->default(0)->nullable();

            //additional column for primary section
            $table->integer('relationship_with_others')->default(0)->nullable();
            $table->integer('participation_in_school_arts')->default(0)->nullable();

            //Psychomoto Report
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
        Schema::dropIfExists('report_cards');
    }
}
