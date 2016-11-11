<?php

/**
 * Created by PhpStorm.
 * User: cintia.santos
 * Date: 09/11/2016
 * Time: 16:31
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;
class UserTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        //limpando a tabela
        DB::table('users')->truncate();

        //inserindo manualmente
        User::create([
            'name' => 'cintia',
            'email' => 'cintia@gmail.com',
            'password'=> Hash::make(123456)
        ]);

        //Inserindo atraves de Faker
        $faker = Faker::create();
        foreach(range(1,4) as $i){
            User::create([
                'name' => $faker->name(),
                'email' => $faker->sentence(),
                'password'=> Hash::make($faker->word)
            ]);
        };

        //Com o uso da factory não preciso mais utilizar o foreach
        //para inserir muitos usuários, basta utilizar o comando abaixo
        factory('CodeCommerce\User',5)->create();
    }
}