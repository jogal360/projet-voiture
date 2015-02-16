<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoitureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voiture', function($table)
		{
			$table->increments('id');
			$table->string('nom_voiture');
			$table->enum('type', ['competition','normal']);
			$table->string('description');
			$table->string('model');
			$table->string('fabricant');
			$table->smallInteger('resistance');
			$table->smallInteger('rpm');
			$table->decimal('vitesse', 3, 2);
			$table->tinyInteger('cylindres');
			$table->smallInteger('cheval_vapeur');
			$table->decimal('taille_recevoir', 3, 2);
			$table->tinyInteger('niveau');
			$table->string('carrosserie');
			$table->string('pneus');
			$table->string('châssis');
			$table->enum('et_stabilite', ['bon état','régulier','mauvais état']);
			$table->enum('et_esthetique', ['bon état','régulier','mauvais état']);
			$table->enum('et_performance', ['bon état','régulier','mauvais état']);
			$table->enum('et_equilibre', ['bon état','régulier','mauvais état']);
			$table->enum('et_general', ['bon état','régulier','mauvais état']);


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
		Schema::drop('voiture');
	}

}

