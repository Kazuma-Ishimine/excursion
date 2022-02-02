<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConflictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conflicts', function (Blueprint $table) {
            // id
            $table->bigIncrements('id');
            // name
            $table->string('name', 50);
            // image
            $table->string('image', 200);
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
        Schema::dropIfExists('conflicts');
    }
}
