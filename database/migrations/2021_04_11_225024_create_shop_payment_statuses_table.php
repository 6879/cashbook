<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPaymentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_payment_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paymentStatusName','100');
            $table->integer('status')->comment('1 = Due, 2 = Paid, 3 = Grace, 4 = Alert');
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
        Schema::dropIfExists('shop_payment_statuses');
    }
}
