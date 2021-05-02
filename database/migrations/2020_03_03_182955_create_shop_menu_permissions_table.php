<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopMenuPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_menu_permissions', function (Blueprint $table) {
            $table->bigIncrements('shopMenuPermissionId');
            $table->integer('employeeEntryId');
            $table->integer('employeeTypeId');
            $table->integer('menuTitleId');
            $table->integer('menuId');
            $table->integer('subMenuId')->nullable();
            $table->integer('fullAccess')->nullable();
            $table->integer('viewAccess')->nullable();
            $table->integer('addAccess')->nullable();
            $table->integer('editAccess')->nullable();
            $table->boolean('permissionStatus');
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
        Schema::dropIfExists('shop_menu_permissions');
    }
}
