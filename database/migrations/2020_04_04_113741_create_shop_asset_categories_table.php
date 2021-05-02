<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAssetCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_asset_categories', function (Blueprint $table) {
            $table->bigIncrements('assetCategoryId');
            $table->string('assetCategoryName');
            $table->integer('assetCategoryPosition')->default(1);
            $table->integer('assetCategoryStatus');
            $table->boolean('assetSubCategoryStatus');
            $table->integer('previousId')->nullable();
            $table->integer('label')->default(1);
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
        Schema::dropIfExists('shop_asset_categories');
    }
}
