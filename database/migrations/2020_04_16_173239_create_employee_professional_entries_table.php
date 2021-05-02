<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProfessionalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_professional_entries', function (Blueprint $table) {
            $table->bigIncrements('employeeProfessionalId');
            $table->integer('employeEntryId');
            $table->string('organizationName');
            $table->string('designation');
            $table->string('yearOfExprience');
            $table->text('address');
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
        Schema::dropIfExists('employee_professional_entries');
    }
}
