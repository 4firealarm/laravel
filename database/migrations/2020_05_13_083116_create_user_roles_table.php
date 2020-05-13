<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_roles', function(Blueprint $table)
		{
			$table->unsignedInteger('user_id')->index('IDX_54FCD59FA76ED395')->comment('用户 ID，关联 users 表主键 ID');
			$table->unsignedInteger('role_id')->index('user_roles_role_id_foreign')->comment('角色 ID，关联 roles 表主键 ID');
			$table->primary(['user_id','role_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_roles');
	}
}
