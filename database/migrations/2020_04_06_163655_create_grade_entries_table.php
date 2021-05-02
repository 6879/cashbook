<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_entries', function (Blueprint $table) {
              $table->bigIncrements('gradeEntryId');
              $table->string('gradeName');
              $table->string('gradeAmount');
              $table->integer('gradeStatus');
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
        Schema::dropIfExists('grade_entries');
    }
}
