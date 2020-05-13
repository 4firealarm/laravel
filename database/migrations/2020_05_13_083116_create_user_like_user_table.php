<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLikeUserTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_like_user', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->text('likes_users')->nullable()->comment('Ani-pattern会用到，所有user_id 变字符串存入。因TINYTEXT为255characters, 用户可以喜欢的用户，需要一个上限。
users_likes中记录的user_id也将全部来源于users表');
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
		Schema::drop('user_like_user');
	}
}
