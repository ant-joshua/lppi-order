<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of product 1',
            'price' => 100,
            'image' => 'product1.jpg',
            'stock' => 10,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of product 2',
            'price' => 200,
            'image' => 'product2.jpg',
            'stock' => 20,
            'category_id' => 3,
        ]);
    }
}
