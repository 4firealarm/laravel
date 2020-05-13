<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topics', function(Blueprint $table)
		{
			$table->increments('id')->comment('主键 ID');
			$table->unsignedInteger('user_id')->index('idx_user_id')->comment('用户 ID，关联 users 表主键 ID');
			$table->string('category_id', 30)->index('idx_category_id')->comment('分类 ID，关联 categories 表主键 ID');
			$table->string('title')->index('idx_title')->comment('话题标题');
			$table->text('body')->comment('话题内容');
			$table->unsignedInteger('last_reply_user_id')->default(0)->comment('最后回复的用户 ID，关联 users 表主键 ID');
			$table->unsignedInteger('reply_count')->default(0)->comment('回复数量');
			$table->unsignedInteger('view_count')->default(0)->comment('查看数量');
			$table->unsignedInteger('sort_value')->default(0)->comment('排序值（根据关注度）');
			$table->text('excerpt')->nullable()->comment('文章摘要');
			$table->string('slug')->nullable()->comment('SEO 友好的 URI');
			$table->timestamps();
			$table->string('label_str', 45)->nullable()->comment('和category_id一起，可以反查label表。同样是一个anti-pattern。label&level;label&level，比如一级分类计算机，二级分类python，首先这两个关键词label里面都会有，而此处的表达是: 计算机&1;python&2');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics');
	}
}
