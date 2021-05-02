<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBussinessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_bussiness_types', function (Blueprint $table) {
            $table->bigIncrements('bussinessTypeId');
            $table->string('bussinessTypeName');
            $table->integer('bussinessTypeStatus');
            $table->string('createBy');
            $table->string('updateBy')->nullable();
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
        Schema::dropIfExists('admin_bussiness_types');
    }
}
