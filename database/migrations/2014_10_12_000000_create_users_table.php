<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('adminId')->nullable();
            $table->integer('shopId')->nullable();
            $table->integer('employeeId')->nullable();
            $table->string('adminAccessId')->nullable();
            $table->string('shopAccessName')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->integer('createBy')->nullable();
            $table->integer('updateBy')->nullable();
            $table->integer('role')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
