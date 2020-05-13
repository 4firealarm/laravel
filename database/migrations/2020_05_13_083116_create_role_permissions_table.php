<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_permissions', function(Blueprint $table)
		{
			$table->unsignedInteger('role_id')->index('IDX_1FBA94E6D60322AC')->comment('角色 ID，关联 roles 表主键 ID');
			$table->unsignedInteger('permission_id')->index('role_permissions_permission_id_foreign')->comment('权限 ID，关联 permissions 表主键 ID');
			$table->primary(['role_id','permission_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_permissions');
	}
}
