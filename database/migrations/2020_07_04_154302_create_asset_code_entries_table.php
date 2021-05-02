<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetCodeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_code_entries', function (Blueprint $table) {
              $table->bigIncrements('assetCodeEntryId');
              $table->integer('assetCategoryId');
              $table->string('assetPorductName');
              $table->string('assetPorductCode');
              $table->boolean('assetCodeStatus');
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
        Schema::dropIfExists('asset_code_entries');
    }
}
