<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'        => "Honda Supercub C125",
                'price'       => 73600000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "TVS Rockz",
                'price'       => 15600000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Yamaha 125Z",
                'price'       => 94200000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda BeAT CBS",
                'price'       => 18050000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda BeAT Street",
                'price'       => 18700000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda BeAT Deluxe",
                'price'       => 18900000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda Genio CBS",
                'price'       => 19110000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda Genio CBS-ISS",
                'price'       => 19730000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda Scoopy Fashion",
                'price'       => 21875000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda Scoopy Sporty",
                'price'       => 21875000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda Scoopy Prestige",
                'price'       => 22680000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name'        => "Honda Scoopy Stylish",
                'price'       => 22680000,
                'description' => null,
                'stock'       => 10,
                'created_at'  => now(),
                'updated_at'  => now()
            ],
        ]);
    }
}
