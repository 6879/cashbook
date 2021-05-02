<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenuPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menu_permissions', function (Blueprint $table) {
            $table->bigIncrements('adminMenuPermissionId');
            $table->integer('adminId');
            $table->integer('adminType');
            $table->integer('menuTitleId');
            $table->integer('menuId');
            $table->string('subMenuId')->nullable();
            $table->string('fullAccess')->nullable();
            $table->string('viewAccess')->nullable();
            $table->string('addAccess')->nullable();
            $table->string('editAccess')->nullable();
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
        Schema::dropIfExists('admin_menu_permissions');
    }
}
