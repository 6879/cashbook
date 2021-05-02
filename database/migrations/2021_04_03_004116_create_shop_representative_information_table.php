<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopRepresentativeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_representative_information', function (Blueprint $table) {
            $table->bigIncrements('shopRepInfoId'); 

            $table->integer('shopId');
            
            $table->string('SRName','100');
            $table->string('SRMobileNo','50');
            $table->string('SREmail','100')->nullable();
            $table->string('SRAddress')->nullable();
            $table->string('SRPhoneNo','50')->nullable();

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
        Schema::dropIfExists('shop_representative_information');
    }
}
