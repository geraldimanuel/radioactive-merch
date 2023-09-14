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
        Merch::create([
            'name' => 'Turbulent Revolution Tee',
            'description' => 'KAOSBIRU',
            'table' => 1,
            'image1' => '1-KAOSBIRU.png',
            'image2' => '2-KAOSBIRU.png',
            'image3' => '3-KAOSBIRU.png',
            'image4' => '4-KAOSBIRU.png',
            'image5' => '4-KAOSBIRU.png',
            'price' => 95000
        ]);

        Merch::create([
            'name' => 'Celestial Revy Tee',
            'description' => 'KAOSPUTIH',
            'table' => 1,
            'image1' => '1-KAOSPUTIH.png',
            'image2' => '2-KAOSPUTIH.png',
            'image3' => '3-KAOSPUTIH.png',
            'image4' => '4-KAOSPUTIH.png',
            'image5' => '5-KAOSPUTIH.png',
            'price' => 95000
        ]);

        Merch::create([
            'name' => 'Radioactive Sticker Pack',
            'table' => 0,
            'description' => 'STICKER',
            'image1' => '1-STICKER.png',
            'image2' => '2-STICKER.png',
            'image3' => '3-STICKER.png',
            'image4' => '4-STICKER.png',
            'image5' => '5-STICKER.png',
            
            'price' => 15000
        ]);

        Merch::create([
            'name' => 'Revolution Tote Bag',
            'description' => 'TOTEBAG',
            'table' => 0,
            'image1' => '1-TOTEBAG.png',
            'image2' => '2-TOTEBAG.png',
            'image3' => '3-TOTEBAG.png',
            'image4' => '4-TOTEBAG.png',
            'image5' => '5-TOTEBAG.png',
            
            'price' => 85000
        ]);

        Merch::create([
            'name' => 'Revy Eggo Tumbler',
            'description' => 'TUMBLER',
            'table' => 0,
            'image1' => '1-TUMBLER.png',
            'image2' => '2-TUMBLER.png',
            'image3' => '3-TUMBLER.png',
            'image4' => '4-TUMBLER.png',
            'image5' => '5-TUMBLER.png',
            'price' => 65000
        ]);
        
        Merch::create([
            'name' => 'Bundle Exclusive 1',
            'description' => 'BUNDLE1',
            'table' => 0,
            'image1' => '1-BUNDLE1.png',
            'image2' => '2-BUNDLE1.png',
            'image3' => '3-BUNDLE1.png',
            'image4' => '4-BUNDLE1.png',
            'image5' => '5-BUNDLE1.png',
            'price' => 115000
        ]);
        
        Merch::create([
            'name' => 'Bundle Exclusive 2',
            'description' => 'BUNDLE2',
            'table' => 0,
            'image1' => '1-BUNDLE2.png',
            'image2' => '2-BUNDLE2.png',
            'image3' => '3-BUNDLE2.png',
            'image4' => '4-BUNDLE2.png',
            'image5' => '5-BUNDLE2.png',
            'price' => 180000
        ]);

        Merch::create([
            'name' => 'Bundle Exclusive 3',
            'description' => 'BUNDLE3',
            'table' => 0,
            'image1' => '1-BUNDLE3.png',
            'image2' => '2-BUNDLE3.png',
            'image3' => '3-BUNDLE3.png',
            'image4' => '4-BUNDLE3.png',
            'image5' => '5-BUNDLE3.png',
            'price' => 240000
        ]);
    }
}