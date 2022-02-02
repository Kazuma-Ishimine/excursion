<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            // id
            $table->bigIncrements('id');
            // name
            $table->string('name', 50);
            // body
            $table->string('body', 500);
            // charge
            $table->string('charge', 500);
            // company_id
            $table->bigInteger('company_id')->unsigned();
            // deleted_at
            $table->softDeletes();
            // created_atとupdated_at
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
        Schema::dropIfExists('services');
    }
}
