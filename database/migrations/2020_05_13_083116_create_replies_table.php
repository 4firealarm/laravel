<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('replies', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->unsignedInteger('topic_id')->default(0)->index('replies_topic_id_foreign')->comment('话题 ID，关联 topics 表主键 ID');
			$table->unsignedInteger('user_id')->default(0)->index('replies_user_id_foreign')->comment('用户 ID，关联 users 表主键 ID');
			$table->text('content')->comment('回复内容');
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
		Schema::drop('replies');
	}
}
