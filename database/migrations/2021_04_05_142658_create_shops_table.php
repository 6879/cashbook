<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shopInfoId');
            
            $table->string('shopName','100');
            $table->integer('shopSirialId');
            $table->string('shopUserName','100');
            $table->string('password','255');
            $table->string('pass','255');
            $table->string('lastLoginIp','255');
            $table->integer('refferTypeId');
            $table->integer('refferUserId');
            $table->integer('shopTypeId');
            $table->integer('shopLicenceTypeId');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('haveBranch');
            $table->integer('totalBranch');

            $table->boolean('status');
            $table->boolean('deleteStatus');
            $table->integer('createBy');
            $table->integer('updateBy')->nullable();
            $table->integer('deleteBy')->nullable();
            $table->timestamps();
            $table->dateTime('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
