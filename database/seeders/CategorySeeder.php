<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Category::create([
            'id' => 1,
            'name' => 'Electronics',
            'parent_id' => null
        ]);


        Category::create([
            'id' => 2,
            'name' => 'Mobile Phones',
            'parent_id' => 1
        ]);

        Category::create([
            'name' => 'Smartphones',
            'parent_id' => 2
        ]);

        Category::create([
            'name' => 'Tablets',
            'parent_id' => 2
        ]);

        Category::create([
            'name' => 'Laptops',
            'parent_id' => 1
        ]);

        Category::create([
            'name' => 'Desktops',
            'parent_id' => 1
        ]);



        // Category::factory(1)->create();
    }
}
