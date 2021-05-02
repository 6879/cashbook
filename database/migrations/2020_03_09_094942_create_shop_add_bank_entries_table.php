<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAddBankEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *


     * @return void
     */
    public function up()
    {
        Schema::create('shop_add_bank_entries', function (Blueprint $table) {
            $table->bigIncrements('bankId');
            $table->integer('bankTypeEntryId');
            $table->integer('bankEntryId');
            $table->string('bankBranch');
            $table->string('bankAccountName');
            $table->integer('bankAccountNumber');
            $table->integer('status');
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
        Schema::dropIfExists('shop_add_bank_entries');
    }
}
