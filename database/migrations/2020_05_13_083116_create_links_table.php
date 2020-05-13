<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->string('name', 64)->index('idx_name')->comment('资源名称');
			$table->string('href')->index('idx_href')->comment('资源链接');
			$table->unsignedTinyInteger('status')->default(1)->comment('资源状态(1:正常 2:停用)');
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
		Schema::drop('links');
	}
}
