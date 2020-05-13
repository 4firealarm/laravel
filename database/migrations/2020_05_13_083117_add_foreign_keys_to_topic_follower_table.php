<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTopicFollowerTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('topic_follower', function(Blueprint $table)
		{
			$table->foreign('topic_id')->references('id')->on('topics')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('topic_follower', function(Blueprint $table)
		{
			$table->dropForeign('topic_follower_topic_id_foreign');
		});
	}
}
