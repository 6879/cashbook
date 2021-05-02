<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOwnerInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_owner_information', function (Blueprint $table) {
            $table->bigIncrements('shopOwnerInfoId'); 
            $table->integer('shopId');
            $table->string('shopOwnerName','100');
            $table->string('shopOwnerMobileNo','50');
            $table->string('shopOwnerEmail','100')->nullable();
            $table->string('shopOwnerAddress')->nullable();
            $table->string('shopOwnerPhoneNo','50')->nullable();
            $table->boolean('status');
            $table->boolean('deleteStatus');
            $table->integer('createBy');
            $table->integer('updateBy')->nullable();
            $table->integer('deleteBy')->nullable();
            $table->timestamps();
            $table->dateTime('deleteDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_owner_information');
    }
}
