<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartSalarySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_salary_setups', function (Blueprint $table) {
              $table->bigIncrements('salarySetupId');
              $table->integer('employeEntryId');
              $table->integer('jobDepartmentId');
              $table->integer('gradeEntryId');
              $table->string('startDate');
              $table->string('monthDate');
              $table->boolean('salarySetupStatus');
              $table->integer('paymentStatus')->default(0);
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
        Schema::dropIfExists('start_salary_setups');
    }
}
