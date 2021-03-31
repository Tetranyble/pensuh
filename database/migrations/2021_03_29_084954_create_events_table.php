<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->integer('school_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
//            $table->string('end_time')->nullable();
//            $table->string('start_time')->nullable();
            $table->text('map')->nullable();
            $table->integer('host_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('events');
    }
}
