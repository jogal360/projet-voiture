<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 15/03/2015
 * Time: 09:27 PM
 */
use Faker\Factory as Faker;
use Voiture\Entities\Utilisateur;
use Voiture\Entities\User;
use Voiture\Entities\BankAccount;
use Voiture\Entities\Operation;
class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 500) as $index)
        {
            $utilisateur = Utilisateur::create([
                'pseudo'        => $faker->userName,
                'password'      => \Hash::make('123'),
                'role_id'       =>6
            ]);
            $user = User::create([
                'id'            =>$utilisateur->id,
                'prenom'        => $faker->firstName($gender = null|'male'|'female'),
                'nom'           => $faker->lastName ,
                'email'         => $faker->email,
                'role_id'       => $utilisateur->role_id,
                'verified'      => 0,
                'number_attemps' => null,
                'confirmation_code' => null,
                'pseudo'        => $utilisateur->pseudo,
                'date_nac'      => $faker->date($format = 'Y-m-d', $max = '-12 years'),
                'sexe'          => $faker->randomElement(['f','m']),
                'phone'         => $faker->numberBetween($min = 10000000, $max = 1000000000),
                'adr_postale'   => $faker->numberBetween($min = 10000, $max = 99999),
                'avatar'        => $faker->randomElement(['p1.png','p2.png','p3.jpg','p4.jpg','p5.png','p6.png','p7.png','p8.jpg','p9.gif','p10.jpg']),
                'description'   => $faker->text($maxNbChars = 240),
                'website_url'   => $faker->url,
                'adr_ip'        => $faker->ipv4,
                'remember_token' => null,
                'created_at'     => $faker->dateTimeThisYear($max = 'now'),
                'updated_at'    => $faker->dateTimeThisMonth($max = 'now')
            ]);
            BankAccount::create([
                'user_id'        => $user->id,
                'solde'         => $faker->randomNumber($nbDigits = NULL),
                'created_at'    => $faker->dateTimeThisYear($max = 'now'),
                'updated_at'    => $faker->dateTimeThisMonth($max = 'now')
            ]);
        }

    }
}