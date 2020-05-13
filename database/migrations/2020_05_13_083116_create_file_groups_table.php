<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileGroupsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('file_groups', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->string('name', 50)->comment('分组名称');
			$table->string('code', 50)->comment('分组代码');
			$table->boolean('is_public')->default(1)->comment('是否公开(0:否 1:是)');
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
		Schema::drop('file_groups');
	}
}
