<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesCustomerEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_customer_entries', function (Blueprint $table) {
            $table->bigIncrements('salesCustomerEntryId');
            $table->integer('customerTypeId');
            $table->string('customerName');
            $table->string('customerEmail');
            $table->string('customerPhone');
            $table->string('customerImoNumber')->nullable();
            $table->string('customerFacebookID')->nullable();
            $table->text('customerAddress');
            $table->string('referenceName')->nullable();
            $table->string('referenceEmail')->nullable();
            $table->string('referencePhone')->nullable();
            $table->string('customerStatus')->default(1);
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
        Schema::dropIfExists('sales_customer_entries');
    }
}
