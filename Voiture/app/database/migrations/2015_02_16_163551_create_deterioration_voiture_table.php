<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeteriorationVoitureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deterioration_voiture', function($table)
		{
			$table->integer('deterioration_id')->unsigned();
			$table->integer('voiture_id')->unsigned();

			$table->foreign('deterioration_id')->references('id')->on('deterioration');
			$table->foreign('voiture_id')->references('id')->on('voiture');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deterioration_voiture');
	}

}
