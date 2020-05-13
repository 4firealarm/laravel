<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->string('id', 30)->primary()->comment('主键 ID');
			$table->string('name', 50)->index('idx_name')->comment('分类名称');
			$table->string('description')->nullable()->comment('分类描述');
			$table->unsignedInteger('post_count')->default(0)->comment('帖子数量');
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
		Schema::drop('categories');
	}
}
