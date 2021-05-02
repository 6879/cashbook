<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseProductEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product_entries', function (Blueprint $table) {
            $table->bigIncrements('purchaseProductId');
            $table->integer('purchaseInvoiceNo');
            $table->integer('productSupplierId');
            $table->integer('productId');
            $table->integer('brandId');
            $table->integer('quantity');
            $table->integer('unitId');
            $table->string('unitPrice');
            $table->string('totalPrice');
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
        Schema::dropIfExists('purchase_product_entries');
    }
}
