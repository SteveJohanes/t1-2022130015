<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $id =  str_pad($i + 1, 3, '0', STR_PAD_LEFT);
            $product_name = $faker->word();
            $description = $faker->sentence(20);
            $retail_price = $faker->randomFloat(2, 1000, 50000);
            $wholesale_price = $retail_price * 0.8;
            $origin = strtoupper($faker->countryCode());
            $quantity = $faker->numberBetween(1, 100);
            $product_image = 'path/to/image' . $id . '.jpg';
            $created_at = $faker->dateTimeBetween('-2 years', 'now');
            $updated_at = now();

            DB::table('products')->insert([
                'id' => $id,
                'product_name' => $product_name,
                'description' => $description,
                'retail_price' => $retail_price,
                'wholesale_price' => $wholesale_price,
                'origin' => $origin,
                'quantity' => $quantity,
                'product_image' => $product_image,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
