<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_entries', function (Blueprint $table) {
            $table->bigIncrements('adminId');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('userId');
            $table->string('password');
            $table->string('address');
            $table->integer('role');
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
        Schema::dropIfExists('admin_entries');
    }
}
