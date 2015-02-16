<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->enum('type', ['refactions','accesoires']);
			$table->smallInteger('niveau_item');
			$table->string('description');
			$table->integer('famille_id')->unsigned();
			$table->decimal('prix_item', 6, 2);
			$table->timestamps();

			$table->foreign('famille_id')->references('id')->on('famille_items');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
