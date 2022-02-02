<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            // id
            $table->bigIncrements('id');
            // name
            $table->string('name', 50);
            // mean
            $table->string('mean', 200);
            // service_id
            $table->bigInteger('service_id')->unsigned();
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
        Schema::dropIfExists('terms');
    }
}
