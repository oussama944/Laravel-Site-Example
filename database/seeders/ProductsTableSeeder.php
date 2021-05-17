<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        
        $faker=Faker::create();
        for($i=0; $i<40;$i++ ){
            Products::create([
                'title'=> $faker->sentence(4),
                
                'slug'=> $faker->slug,
                'subtitle'=> $faker->sentence(6),
                'description'=> $faker->text,
                'price'=> $faker->numberBetween(15,300)*100,
                'image'=>'https://via.placeholder.com/200x250'
            ]);
        }
    }
}
