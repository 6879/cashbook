<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopEmployeeLoginTimeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_employee_login_time_entries', function (Blueprint $table) {
            $table->bigIncrements('employeeLoginTimeId');
            $table->integer('shopEmployeeEntryId');
            $table->string('employeeLoginTimeStart');
            $table->string('employeeLoginTimeEnd');
            $table->string('employeeLoginOffDay');
            $table->integer('employeeLoginStatus');
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
        Schema::dropIfExists('shop_employee_login_time_entries');
    }
}
