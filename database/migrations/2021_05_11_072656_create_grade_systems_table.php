<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grade');
            $table->float('point');
            $table->integer('from_mark');
            $table->integer('to_mark');
            $table->integer('school_id')->unsigned();
            $table->integer('school_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('grade_systems');
    }
}
