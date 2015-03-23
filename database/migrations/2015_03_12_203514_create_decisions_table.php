<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('decisions')) {
			Schema::create('decisions', function (Blueprint $table) {
				$table->increments('id')->unsigned();
				$table->boolean('choice');
				$table->timestamps();
				$table->integer('user_id')->unsigned()->unique();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('decisions');
	}

}
