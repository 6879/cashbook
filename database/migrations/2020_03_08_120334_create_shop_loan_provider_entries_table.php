<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopLoanProviderEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_loan_provider_entries', function (Blueprint $table) {
            $table->bigIncrements('loanProviderId');
            $table->string('loanProviderName');
            $table->string('loanProviderPhone');
            $table->text('loanProviderAddress');
            $table->integer('loanProviderStatus');
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
        Schema::dropIfExists('shop_loan_provider_entries');
    }
}
