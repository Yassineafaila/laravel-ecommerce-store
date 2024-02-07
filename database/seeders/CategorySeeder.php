<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Smartphones',
            ],
            [
                'id' => 2,
                'name' => 'Laptops & Computers',
            ],
            [
                'id' => 3,
                'name' => 'Tablets & E-Readers',
            ],
            [
                'id' => 4,
                'name' => 'Audio & Headphones',
            ],
            [
                'id' => 5,
                'name' => 'TVs & Home Theater',
            ],
            [
                'id' => 6,
                'name' => 'Cameras & Photography',
            ],
            [
                'id' => 7,
                'name' => 'Gaming',
            ],
            [
                'id' => 8,
                'name' => 'Smart Home Devices',
            ],
            [
                'id' => 9,
                'name' => 'Wearable Technology',
            ],
            [
                'id' => 10,
                'name' => 'Accessories & Gadgets',
            ],
        ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
