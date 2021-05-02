<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProductDiscountPriceEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_product_discount_price_entries', function (Blueprint $table) {
            $table->bigIncrements('salesProductDiscountPriceId');
            $table->integer('purchaseProductId');
            $table->integer('productId');
            $table->string('mrpDiscountAmount')->nullable();
            $table->string('mrpDiscountType')->nullable();
            $table->string('mrpStartDate')->nullable();
            $table->string('mrpExpiredDate')->nullable();
            $table->string('mrpPrice')->nullable();
            $table->string('salesDiscountAmount')->nullable();
            $table->string('salesDiscountType')->nullable();
            $table->string('salesStartDate')->nullable();
            $table->string('salesExpiredDate')->nullable();
            $table->string('salesPrice')->nullable();
            $table->string('wholesaleDiscountAmount')->nullable();
            $table->string('wholesaleDiscountType')->nullable();
            $table->string('wholesaleStartDate')->nullable();
            $table->string('wholesaleExpiredDate')->nullable();
            $table->string('wholesalePrice')->nullable();
            $table->string('specialDiscountAmount')->nullable();
            $table->string('specialDiscountType')->nullable();
            $table->string('specialStartDate')->nullable();
            $table->string('specialExpiredDate')->nullable();
            $table->string('specialPrice')->nullable();
            $table->string('eCommerceDiscountAmount')->nullable();
            $table->string('eCommerceDiscountType')->nullable();
            $table->string('eCommerceStartDate')->nullable();
            $table->string('eCommerceExpiredDate')->nullable();
            $table->string('eCommercePrice')->nullable();
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
        Schema::dropIfExists('sales_product_discount_price_entries');
    }
}
