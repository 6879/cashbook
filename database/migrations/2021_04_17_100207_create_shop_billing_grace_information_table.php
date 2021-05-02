<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopBillingGraceInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_billing_grace_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shopId');
            $table->datetime('date');
            $table->string('message','255');
            $table->integer('create_by');
            $table->integer('update_by')->null();
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
        Schema::dropIfExists('shop_billing_grace_information');
    }
}
