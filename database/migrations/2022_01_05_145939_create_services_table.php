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
            // Name(サービス名)
            $table->string('name', 50);
            // Body(サービスの内容)
            $table->string('body', 500);
            // Charge(料金体系)
            $table->string('charge', 500);
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
