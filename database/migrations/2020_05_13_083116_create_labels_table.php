<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('labels', function(Blueprint $table)
		{
			$table->string('category_id', 30)->index('labels_category_id_foreign_idx');
			$table->string('label', 30);
			$table->integer('label_level')->comment('作为分辨label的层级');
			$table->index(['label','category_id','label_level'], 'labels_idx_label');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('labels');
	}
}
