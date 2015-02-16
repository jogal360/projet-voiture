<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('UtilisateursTableSeeder');

	}

}
class RolesTableSeeder extends Seeder {

	public function run()
	{

		DB::table('roles')->insert(array(
			'name' => 'moderateur_com'
		));
		DB::table('roles')->insert(array(
			'name' => 'specialiste'
		));
		DB::table('roles')->insert(array(
			'name' => 'admin_concours'
		));
		DB::table('roles')->insert(array(
			'name' => 'editorialiste'
		));
		DB::table('roles')->insert(array(
			'name' => 'client'
		));
		DB::table('roles')->insert(array(
			'name' => 'user'
		));

	}
}
class UtilisateursTableSeeder extends Seeder {
	public function run()
	{
		DB::table('utilisateurs')->insert(array(
			'pseudo' 	=> 'mod1',
			'password'	=> Hash::make('123'),
			'role_id'	=> 1
		));
		DB::table('utilisateurs')->insert(array(
			'pseudo' 	=> 'spe1',
			'password'	=> Hash::make('123'),
			'role_id'	=> 2
		));
		DB::table('utilisateurs')->insert(array(
			'pseudo' 	=> 'adc',
			'password'	=> Hash::make('123'),
			'role_id'	=> 3
		));
		DB::table('utilisateurs')->insert(array(
			'pseudo' 	=> 'edit1',
			'password'	=> Hash::make('123'),
			'role_id'	=> 4
		));
		DB::table('utilisateurs')->insert(array(
			'pseudo' 	=> 'cli1',
			'password'	=> Hash::make('123'),
			'role_id'	=> 5
		));
	}
}