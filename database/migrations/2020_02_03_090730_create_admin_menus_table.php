<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->bigIncrements('adminMenuId');
            $table->integer('adminMenuTitleId');
            $table->string('adminMenuName');
            $table->string('adminMenuPosition');
            $table->string('adminMenuUrl')->nullable();
            $table->string('adminMenuIcon')->nullable();
            $table->integer('adminMenuStatus');
            $table->boolean('adminSubMenuStatus');
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
        Schema::dropIfExists('admin_menus');
    }
}
