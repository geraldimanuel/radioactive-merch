<?php

namespace Database\Seeders;

use App\Models\Merch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Merch::create([
            'name' => 'Turbulent Revolution Tee',
            'description' => 'T-Shirt',
            'table' => 1,
            'image' => 't-shirt.jpg',
            'price' => 95000,
            'stock' => 10,
        ]);

        Merch::create([
            'name' => 'Celestial Revy Tee',
            'description' => 'T-Shirt',
            'table' => 1,
            'image' => 't-shirt.jpg',
            'price' => 95000,
            'stock' => 10,
        ]);

        Merch::create([
            'name' => 'Radioactive Sticker Pack',
            'table' => 0,
            'description' => 'Jacket',
            'image' => 't-shirt.jpg',
            'price' => 15000,
            'stock' => 10,
        ]);

        Merch::create([
            'name' => 'Revolution Tote Bag',
            'description' => 'Hat',
            'table' => 0,
            'image' => 't-shirt.jpg',
            'price' => 85000,
            'stock' => 10,
        ]);

        Merch::create([
            'name' => 'Revy Eggo Tumbler',
            'description' => 'Pants',
            'table' => 0,
            'image' => 't-shirt.jpg',
            'price' => 65000,
            'stock' => 10,
        ]);
        
        Merch::create([
            'name' => 'Bundle Exclusive 1',
            'description' => 'Pants',
            'table' => 0,
            'image' => 't-shirt.jpg',
            'price' => 115000,
            'stock' => 10,
        ]);
        
        Merch::create([
            'name' => 'Bundle Exclusive 2',
            'description' => 'Pants',
            'table' => 0,
            'image' => 't-shirt.jpg',
            'price' => 180000,
            'stock' => 10,
        ]);

        Merch::create([
            'name' => 'Bundle Exclusive 3',
            'description' => 'Pants',
            'table' => 0,
            'image' => 't-shirt.jpg',
            'price' => 240000,
            'stock' => 10,
        ]);
    }
}
