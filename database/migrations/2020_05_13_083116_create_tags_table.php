<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table)
		{
			$table->string('tag', 30)->comment('此为可能的label候选');
			$table->string('category_id', 30)->index('tags_category_id_foreign_idx');
			$table->date('last_time_used')->comment('It is recorded from the topic table');
			$table->primary(['category_id','tag']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
	}
}
