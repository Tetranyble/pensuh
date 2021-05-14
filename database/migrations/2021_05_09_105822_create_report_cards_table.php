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
            $table->float('score',8,2)->default(0)->nullable();
            $table->float('average',8,2)->default(0)->nullable();
            $table->float('position',8,2)->default(0)->nullable();
            $table->string('form_teacher_comment')->default('')->nullable();
            $table->integer('puntuality')->default(0)->nullable();
            $table->integer('attendance')->default(0)->nullable();
            $table->integer('attentiveness')->default(0)->nullable();
            $table->integer('initiative')->default(0)->nullable();
            $table->integer('perseverance')->default(0)->nullable();
            $table->integer('perseverance')->default(0)->nullable();
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
