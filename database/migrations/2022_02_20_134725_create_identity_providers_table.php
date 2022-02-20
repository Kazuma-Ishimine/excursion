<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentityProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity_providers', function (Blueprint $table) {
            // user_id
            $table->bigInteger('user_id')->unsigned();
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users'); 
            // provider_id
            $table->string('provider_id');
            // provider_name
            $table->string('provider_name');
            // 複合キー
            $table->primary(['provider_name', 'provider_id']); 
            // ユニーク制限
            $table->unique(['user_id', 'provider_name']); 
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
        Schema::dropIfExists('identity_providers');
    }
}
