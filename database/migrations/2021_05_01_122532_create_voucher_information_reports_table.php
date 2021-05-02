<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherInformationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_information_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shopId');
            $table->integer('branchId');
            $table->dateTime('voucherDate');
            $table->integer('voucherType');
            $table->integer('voucherSource')->default('0');
            $table->string('voucherNo','50');
            $table->string('voucherUniqueId','100');
            $table->string('paymentTo','100');
            $table->string('mobileNo','100');
            $table->integer('checkPaymentType')->nullable();
            $table->string('receiverBankAccountName','255')->nullable();
            $table->string('chequeNo','100')->nullable();
            $table->dateTime('chequeDate')->nullable();

            $table->string('accountsCode','100');
            $table->integer('type');
            $table->double('voucherAmount');
            $table->integer('randId');

            $table->string('particular','255');
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->integer('openingVoucher')->default('0');

            $table->boolean('status')->default('1');
            $table->boolean('deleteStatus')->nullable();
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
        Schema::dropIfExists('voucher_information_reports');
    }
}
