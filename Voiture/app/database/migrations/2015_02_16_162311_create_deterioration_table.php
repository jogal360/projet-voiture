<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeteriorationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deterioration', function($table)
		{
			$table->increments('id');
			$table->string('nom_deterioration');
			$table->string('description_deter');
			$table->enum('type', ['interne','externe']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deterioration');
	}

}
