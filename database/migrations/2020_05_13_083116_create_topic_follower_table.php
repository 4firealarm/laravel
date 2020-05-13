<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicFollowerTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic_follower', function(Blueprint $table)
		{
			$table->increments('topic_id');
			$table->text('follower_ids')->nullable()->comment('Anti-pattern here, user id from users table, put them into string and stored');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topic_follower');
	}
}
