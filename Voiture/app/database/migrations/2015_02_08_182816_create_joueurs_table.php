<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoueursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('joueurs', function($table)
		{
			$table->increments('id');

			$table->string('pseudo', 25);
			$table->date('date_nac');
			$table->enum('sexe', ['m', 'f']);
			$table->char('phone', 15);
			$table->char('adr_postale', 5);
			$table->string('avatar', 30);
			$table->string('description');
			$table->string('website_url', 50);
			$table->string('adr_ip', 15);
			$table->tinyInteger('number_attemps');

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
		Schema::drop('joueurs');
	}

}
