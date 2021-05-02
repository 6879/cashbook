<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAssetEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_asset_entries', function (Blueprint $table) {
            $table->bigIncrements('shopAssetEntryId');
            $table->integer('assetCategoryId');
            $table->integer('assetProductId');
            $table->integer('assetSupplierId');
            $table->integer('assetBrandId');
            $table->string('purchasedate')->nullable();
            $table->string('mfgDate')->nullable();
            $table->string('expiryDate')->nullable();
            $table->string('invoiceNo')->nullable();
            $table->string('modelNo')->nullable();
            $table->string('productQuantity');
            $table->string('productCost');
            $table->string('totalProductCost');
            $table->string('currentPayable');
            $table->string('previousPayableDue')->nullable();
            $table->double('depreciation', 20, 3)->nullable();
            $table->string('depreciationDay')->nullable();
            $table->string('depreciationMonth')->nullable();
            $table->string('depreciationYear')->nullable();
            $table->string('warranty')->nullable();
            $table->string('selectMothOrYearWarranty')->nullable();
            $table->string('guarantee')->nullable();
            $table->string('selectMothOrYearGuarantee')->nullable();
            $table->string('color')->nullable();
            $table->text('size')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('shop_asset_entries');
    }
}
