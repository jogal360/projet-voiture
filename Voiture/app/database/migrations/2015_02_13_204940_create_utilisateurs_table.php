<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilisateurs', function($table)
		{
			$table->increments('id');

			$table->string('pseudo', 30)->unique();
			$table->string('password');
			$table->integer('role_id')->unsigned();

			$table->string('remember_token')->nullable();
			$table->foreign('role_id')->references('id')->on('roles');

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
		Schema::drop('utilisateurs');
	}


}
