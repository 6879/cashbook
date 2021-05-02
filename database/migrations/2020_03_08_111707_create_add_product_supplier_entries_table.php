<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddProductSupplierEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_product_supplier_entries', function (Blueprint $table) {
            $table->bigIncrements('productSupplierId');
            $table->string('productSupplierName')->nullable();
            $table->string('productSupplierCode')->nullable();
            $table->string('productSupplierPhone')->nullable();
            $table->string('productSupplierHotLine')->nullable();
            $table->string('productSupplierMail')->nullable();
            $table->string('productSupplierFb')->nullable();
            $table->string('productSupplierWeb')->nullable();
            $table->string('productSupplierImo')->nullable();
            $table->string('productSupplierAddress')->nullable();
            $table->integer('shopId')->nullable();
            $table->integer('shopTypeId')->nullable();
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
        Schema::dropIfExists('add_product_supplier_entries');
    }
}
