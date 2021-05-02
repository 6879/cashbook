<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopLoanEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_loan_entries', function (Blueprint $table) {
            $table->bigIncrements('loanEntryId');
            $table->integer('loanProviderId');
            $table->string('loanAmount');
            $table->string('loanCondition');
            $table->string('loanCommitment');
            $table->integer('loanStatus');
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
        Schema::dropIfExists('shop_loan_entries');
    }
}
