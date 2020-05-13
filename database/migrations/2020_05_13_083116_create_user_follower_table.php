<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowerTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_follower', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->text('followed_by')->nullable()->comment('Anti-pattern, user_id put into string and append');
			$table->tinyInteger('last_action')->nullable()->comment('Add is one, delete is zero');
			$table->dateTime('last_update')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_follower');
	}
}
