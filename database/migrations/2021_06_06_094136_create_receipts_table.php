<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('receipts', function (Blueprint $table) {
//            $table->id();
//            $table->bigInteger('student_id');
//            $table->bigInteger('paid_by_id')->nullable();
//            $table->bigInteger('school_id');
//            $table->bigInteger('transaction_id')->nullable();
//            $table->longText('data');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('receipts');
    }
}
