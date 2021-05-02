<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAccountIntormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_account_intormations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shopId');
            $table->dateTime('billingDate')->default(0);
            $table->dateTime('billingGraceDate')->default(0);
            $table->double('billAmount')->default(0);
            $table->double('totalMonth')->default(0);
            $table->double('totalPaid')->default(0);
            $table->double('currentDue')->default(0);
            $table->double('topupCurrentBalance')->default(0);
            $table->double('topupTotalBalance')->default(0);
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
        Schema::dropIfExists('shop_account_intormations');
    }
}
