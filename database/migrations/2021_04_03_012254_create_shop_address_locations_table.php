<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAddressLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_address_locations', function (Blueprint $table) {
            $table->bigIncrements('shopALId'); 

            $table->integer('shopId');
            $table->integer('branchId');
            $table->integer('countryId');
            $table->integer('divisionId');
            $table->integer('districtId');
            $table->integer('thanaId');
            $table->integer('unionId')->nullable();
            $table->integer('wardId')->nullable();
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('front','255')->nullable();
            $table->string('back','255')->nullable();
            $table->string('left','255')->nullable();
            $table->string('right','255')->nullable();
            $table->string('shopSize','255')->nullable();
            $table->string('marketName','255')->nullable();
            $table->string('shopNo','255')->nullable();
            $table->string('areaKnownName','255')->nullable();

            $table->boolean('status');
            $table->boolean('deleteStatus');
            $table->integer('createBy');
            $table->integer('updateBy')->nullable();
            $table->integer('deleteBy')->nullable();
            $table->timestamps();
            $table->dateTime('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_address_locations');
    }
}
