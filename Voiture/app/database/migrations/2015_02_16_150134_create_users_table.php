<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->string('prenom', 30);
			$table->string('nom', 20);
			$table->string('email', 65);
			$table->integer('role_id')->unsigned();
			$table->boolean('verified')->nullable();
			$table->tinyInteger('number_attemps')->nullable();
			$table->string('confirmation_code')->nullable();
			$table->string('pseudo', 50);
			$table->date('date_nac');
			$table->enum('sexe', ['m', 'f']);
			$table->char('phone', 15);
			$table->char('adr_postale', 5);
			$table->string('avatar', 50);
			$table->string('description');
			$table->string('website_url', 100);
			$table->string('adr_ip', 20);
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
