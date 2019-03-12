<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('full_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('password_confirmation');
            $table->string('level')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('start_working_date')->nullable();
            $table->date('stop_working_date')->nullable();
            $table->string('status')->nullable();
            $table->string('position')->nullable();
            $table->string('rank')->nullable();
            $table->string('contract')->nullable();
            $table->rememberToken();
            // $table->rememberToken();
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
