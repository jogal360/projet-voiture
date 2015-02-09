<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->boolean('verified');
		});

		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->string('prenom', 30);
			$table->string('nom', 20);
			$table->string('email', 25);
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
		Schema::drop('users');
	}

}
