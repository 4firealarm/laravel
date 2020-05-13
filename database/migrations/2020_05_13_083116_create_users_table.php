<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->string('name', 64)->comment('用户名');
			$table->string('phone', 32)->nullable()->unique('uk_phone')->comment('手机号');
			$table->string('email', 64)->nullable()->unique('uk_email')->comment('邮箱');
			$table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
			$table->string('password')->nullable()->comment('密码');
			$table->string('weixin_openid')->nullable()->unique('uk_openid')->comment('微信 OpenID');
			$table->string('weixin_unionid')->nullable()->unique('uk_unionid')->comment('微信 UnionID');
			$table->string('introduction')->nullable()->comment('个人简介');
			$table->string('avatar')->nullable()->comment('个人头像');
			$table->rememberToken()->comment('记住令牌');
			$table->timestamps();
			$table->timestamp('last_actived_at')->nullable()->comment('最后活跃时间');
			$table->unsignedInteger('notification_count')->default(0)->comment('通知数量');
			$table->string('registration_id')->nullable()->comment('注册 ID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
