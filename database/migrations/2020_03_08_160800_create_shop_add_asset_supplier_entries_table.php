<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAddAssetSupplierEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_add_asset_supplier_entries', function (Blueprint $table) {
            $table->bigIncrements('assetSupplierId');
            $table->string('assetSupplierName')->nullable();
            $table->string('assetSupplierCode')->nullable();
            $table->string('assetSupplierPhone')->nullable();
            $table->string('assetSupplierHotLine')->nullable();
            $table->string('assetSupplierMail')->nullable();
            $table->string('assetSupplierFb')->nullable();
            $table->string('assetSupplierWeb')->nullable();
            $table->string('assetSupplierImo')->nullable();
            $table->string('assetSupplierAddress')->nullable();
            $table->string('shopTypeId')->nullable();
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
        Schema::dropIfExists('shop_add_asset_supplier_entries');
    }
}
