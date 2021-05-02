<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPriceSetupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_price_setup_details', function (Blueprint $table) {
            $table->bigIncrements('productPriceSetupid');
            $table->integer('categoryId');
            $table->integer('productNameId');
            $table->integer('productBrandId');
            $table->integer('batchNo')->nullable();
            $table->string('mfgDate')->nullable();
            $table->string('expDate')->nullable();
            $table->integer('modelNo')->nullable();
            $table->string('warranty')->nullable();
            $table->string('guranty')->nullable();
            $table->integer('notification');
            $table->integer('mrp');
            $table->integer('salesPrice');
            $table->integer('holeSalesPrice');
            $table->integer('relativePrice');
            $table->longText('condition');
            $table->longText('advantage');
            $table->longText('detail');
            $table->longText('useSystem');
            $table->integer('shopId');
            $table->integer('shopUserId');
            $table->integer('shopTypeId');
            $table->longText('createBy');
            $table->longText('updateBy')->nullable();
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
        Schema::dropIfExists('product_price_setup_details');
    }
}
