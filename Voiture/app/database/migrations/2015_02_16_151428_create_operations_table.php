<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operations', function($table)
		{
			$table->increments('id');
			$table->integer('bankacc_id')->unsigned();
			$table->string('description');
			$table->foreign('bankacc_id')->references('id')->on('bank_account');

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
		Schema::drop('operations');
	}

}
