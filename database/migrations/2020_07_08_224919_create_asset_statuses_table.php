<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_statuses', function (Blueprint $table) {
            $table->bigIncrements('assetStatusId');
            $table->integer('shopAssetEntryId');
            $table->integer('typeSelectId');
            $table->integer('typeOptionId');
            $table->string('sendDate');
            $table->string('receiveDate')->nullable();
            $table->text('remarkSendTime');
            $table->text('remarkReceiveTime')->nullable();
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
        Schema::dropIfExists('asset_statuses');
    }
}
