<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseProductMoreFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product_more_fields', function (Blueprint $table) {
               $table->bigIncrements('purchaseProductMoreFieldId');
               $table->unsignedBigInteger('serialId');
               $table->unsignedBigInteger('purchaseInvoiceNo');
               $table->unsignedBigInteger('purchaseProductId');
               $table->string('optionName');
               $table->string('optionWork');
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
        Schema::dropIfExists('purchase_product_more_fields');
    }
}
