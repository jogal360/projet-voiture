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

		$this->call('RolesTableSeeder');
        $this->call('UtilisateursTableSeeder');
        $this->call('UsersTableSeeder');
	}

}
class RolesTableSeeder extends Seeder {

	public function run()
	{

		DB::table('roles')->insert(array(
			'name' => 'Modérateur de Communauté'
		));
		DB::table('roles')->insert(array(
			'name' => 'Epecialiste'
		));
		DB::table('roles')->insert(array(
			'name' => 'Admin de concours'
		));
		DB::table('roles')->insert(array(
			'name' => 'Editorialiste'
		));
		DB::table('roles')->insert(array(
			'name' => 'Client'
		));
		DB::table('roles')->insert(array(
			'name' => 'user'
		));
        DB::table('roles')->insert(array(
            'name' => 'Super admin'
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
        DB::table('utilisateurs')->insert(array(
            'pseudo' 	=> 'sadmin',
            'password'	=> Hash::make('123'),
            'role_id'	=> 7
        ));
	}
}
