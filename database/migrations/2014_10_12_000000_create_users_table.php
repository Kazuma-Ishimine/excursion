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
            // id
            $table->bigIncrements('id');
            // provider_id
            $table->string('provider_id')->nullable();
            // name
            $table->string('name');
            // provider_name
            $table->string('provider_name')->nullable();
            // email
            $table->string('email')->unique()->nullable();
            // email_verified_at
            $table->timestamp('email_verified_at')->nullable();
            // password
            $table->string('password')->nullable();
            // remember_token
            $table->rememberToken();
            // created_atとupdated_at
            $table->timestamps();
            // deleted_at
            $table->softDeletes();
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
