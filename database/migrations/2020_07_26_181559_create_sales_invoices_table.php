<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->bigIncrements('salesInvoiceId');
            $table->string('salesDate');
            $table->integer('salesInvoiceNo');
            $table->integer('salesCustomerTypeId');
            $table->integer('salesCustomerId');
            $table->integer('totalQuantity');
            $table->string('totalBalance');
            $table->string('discountPrice')->nullable();
            $table->string('totalVat')->nullable();
            $table->string('vatCalculate')->nullable();
            $table->string('totalPayable');
            $table->string('previousDue')->nullable();
            $table->string('currentTotalAmount');
            $table->string('currentPaidAmount');
            $table->integer('shopId');
            $table->integer('shopTypeId');
            $table->integer('shopUserId');
            $table->integer('createBy');
            $table->integer('updateBy')->nullable();
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
        Schema::dropIfExists('sales_invoices');
    }
}
