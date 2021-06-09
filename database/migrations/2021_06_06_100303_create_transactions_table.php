<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('transactions', function (Blueprint $table) {
//            $table->id();
//            $table->bigInteger('amount');
//            $table->string('reference');
//            $table->string('status');
//            $table->string('currency');
//            $table->string('card_type')->nullable();
//            $table->string('last4')->nullable();
//            $table->string('exp_month')->nullable();
//            $table->string('exp_year')->nullable();
//            $table->string('bank')->nullable();
//            $table->string('channel')->nullable();
//            $table->longText('metadata')->nullable();
//            $table->string('email');
//            $table->string('account_name')->nullable();
//            $table->bigInteger('school_id');
//            $table->string('ip_address')->nullable();
//            $table->bigInteger('user_id');
//            $table->boolean('reusable');
//            $table->string('authorization_code')->nullable();
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
//        Schema::dropIfExists('transactions');
    }
}
