<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->string('name', 64)->comment('权限名称');
			$table->string('slug')->nullable()->unique()->comment('权限编码');
			$table->unsignedInteger('parent_id')->default(0)->comment('父级 ID');
			$table->unsignedTinyInteger('level')->default(0)->comment('权限层级');
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
		Schema::drop('permissions');
	}
}
