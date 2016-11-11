<?php

/**
 * Created by PhpStorm.
 * User: cintia.santos
 * Date: 09/11/2016
 * Time: 16:31
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;
class CategoryTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        //limpando a tabela
        DB::table('categories')->truncate();

        // inserindo manualmente
        Category::create([
            'name'=> 'Category 1',
            'description'=> 'Description category 1'
        ]);
        Category::create([
            'name'=> 'Category 2',
            'description'=> 'Description category 2'
        ]);

        //inserindo atraves de faker
        $faker = Faker::create();
        foreach(range(1,3) as $i){
            Category::create([
                'name' => $faker->word(),
                'description' => $faker->sentence()
            ]);
        }

        //inserindo atraves de factory
        factory('CodeCommerce\Category',10)->create();

    }
}