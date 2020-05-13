<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('failed_jobs', function(Blueprint $table)
		{
			$table->bigIncrements('id')->comment('主键 ID');
			$table->text('connection')->comment('连接');
			$table->text('queue')->comment('队列');
			$table->longText('payload')->comment('载荷');
			$table->longText('exception')->comment('异常');
			$table->timestamp('failed_at')->useCurrent()->comment('失败时间');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('failed_jobs');
	}
}
