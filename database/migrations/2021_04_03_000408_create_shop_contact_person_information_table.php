<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopContactPersonInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_contact_person_information', function (Blueprint $table) {
            $table->bigIncrements('shopCPInfoId'); 

            $table->integer('shopId');
            
            $table->string('CPName','100');
            $table->string('CPMobileNo','50');
            $table->string('CPEmail','100')->nullable();
            $table->string('CPAddress')->nullable();
            $table->string('CPPhoneNo','50')->nullable();

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
        Schema::dropIfExists('shop_contact_person_information');
    }
}
