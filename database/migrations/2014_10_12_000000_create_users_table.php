<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->default('')->nullable();
            $table->string('middlename')->default('')->nullable();

            $table->string('username')->unique();
            $table->string('school_id')->default('')->nullable();

            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('active')->default(false);
            $table->integer('code')->unique()->nullable();//Auto generated
            $table->string('gender')->default('')->nullable();

            $table->string('blood_group')->default('')->nullable();
            $table->string('nationality')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->string('address')->default('')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('twitter')->default('')->nullable();
            $table->string('facebook')->default('')->nullable();
            $table->string('instagram')->default('')->nullable();
            $table->string('linkedin')->default('')->nullable();

            $table->string('about')->default('')->nullable();
            $table->string('photo')->nullable()->default('storage/user.png');
            $table->integer('department_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
