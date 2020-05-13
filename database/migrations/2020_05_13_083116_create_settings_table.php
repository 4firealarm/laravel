<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->string('name', 64)->comment('设置键');
			$table->json('value')->comment('设置值');
			$table->string('namespace', 32)->default('default')->comment('设置命名空间');
			$table->timestamps();
			$table->unique(['name','namespace'], 'uk_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}
}
