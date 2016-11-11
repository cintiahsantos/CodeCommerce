<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //limpando a tabela
        DB::table('products')->truncate();

        // inserindo manualmente
        Product::create([
            'name'=> 'Product 1',
            'description'=> 'Description product 1',
            'price'=> 100.00,
            'featured'=> 1,
            'recommend'=> 0
        ]);

        //inserindo atraves de faker
        $faker = Faker::create();
        foreach(range(1,4) as $i){
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price'=> $faker->randomNumber($nbDigits = 2),
                'featured'=> $faker->numberBetween($min = 0, $max = 1),
                'recommend'=> $faker->numberBetween($min = 0, $max = 1)
            ]);
        }

        //inserindo atraves de factory
        factory('CodeCommerce\Product',10)->create();

    }
}
