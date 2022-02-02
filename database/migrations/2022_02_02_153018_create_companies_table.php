<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            // id
            $table->bigIncrements('id');
            // name
            $table->string('name', 50);
            // image
            $table->string('image', 200);
            // industry_id
            $table->bigInteger('industry_id')->unsigned();
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
        Schema::dropIfExists('companies');
    }
}
