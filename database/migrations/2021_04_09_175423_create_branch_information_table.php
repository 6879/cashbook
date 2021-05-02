<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shopId');
            $table->string('branchName','100');
            $table->integer('branchCode');
            $table->string('branchMobileNo','50');
            $table->string('branchRepresentativeName','100');
            $table->string('branchRepresentativeMobileNo','50');
            $table->string('branchAddress','255');
            $table->integer('paymentStatus');
        
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
        Schema::dropIfExists('branch_information');
    }
}
