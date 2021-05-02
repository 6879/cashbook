<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopEmployeeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_employee_entries', function (Blueprint $table) {
            $table->bigIncrements('shopEmployeeEntryId');
            $table->integer('jobDepartmentId');
            $table->integer('employeeTypeId');
            $table->string('userName');
            $table->string('password');
            $table->string('fullName');
            $table->string('fatherName');
            $table->string('motherName');
            $table->string('dateOfBirth');
            $table->string('phoneNumber');
            $table->integer('religion');
            $table->integer('sex');
            $table->integer('maritalStatus');
            $table->integer('nidNumber');
            $table->string('nationality');
            $table->text('presentAddress');
            $table->text('permanentAddress');
            $table->integer('shopId')->nullable();
            $table->integer('shopTypeId')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('shop_employee_entries');
    }
}
