<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProductEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_product_entries', function (Blueprint $table) {
            $table->bigIncrements('salesProductEntryId');
            $table->integer('salesInvoiceNo');
            $table->string('salesDate');
            $table->integer('salesCustomerId');
            $table->integer('purchaseProductId');
            $table->integer('productId');
            $table->integer('brandId');
            $table->integer('unitId');
            $table->integer('quantity');
            $table->integer('unitPrice');
            $table->integer('totalPrice');
            $table->integer('discountPrice')->nullable();
            $table->integer('priceType');
            $table->integer('shopId');
            $table->integer('shopTypeId');
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
        Schema::dropIfExists('sales_product_entries');
    }
}
