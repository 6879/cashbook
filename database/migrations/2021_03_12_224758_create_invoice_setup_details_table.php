<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSetupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_setup_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoiceSetupId');
            $table->string('logo','255');
            $table->string('address');
            $table->string('toText','255')->nullable(true);
            $table->string('titleText','255')->nullable(true);
            $table->string('themeColor','100')->nullable(true);
            $table->string('subTotal','100');
            $table->string('vat','100');
            $table->string('discount','100');
            $table->string('grandTotal','100');
            $table->string('noticeTitle','100')->nullable(true);
            $table->string('noticeDetails')->nullable(true);
            $table->string('generatedFrom')->nullable(true);
            $table->string('thankyou');
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
        Schema::dropIfExists('invoice_setup_details');
    }
}
