<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProductPriceEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_product_price_entries', function (Blueprint $table) {
            $table->bigIncrements('salesProductPriceEntryId');
            $table->integer('purchaseProductId');
            $table->integer('productId');
            $table->string('mrpPrice')->nullable();
            $table->string('salesPrice')->nullable();
            $table->string('wholesalePrice')->nullable();
            $table->string('specialPrice')->nullable();
            $table->string('eCommercePrice')->nullable();
            $table->integer('quantity');
            $table->integer('alertQuantity')->nullable();
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
        Schema::dropIfExists('sales_product_price_entries');
    }
}
