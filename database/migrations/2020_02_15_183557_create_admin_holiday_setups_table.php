<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminHolidaySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_holiday_setups', function (Blueprint $table) {
            $table->bigIncrements('holidaySetupId');
            $table->integer('holidayTypeId');
            $table->string('holidayStartDate');
            $table->string('holidayEndDate');
            $table->integer('holidaySetupStatus');
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
        Schema::dropIfExists('admin_holiday_setups');
    }
}
