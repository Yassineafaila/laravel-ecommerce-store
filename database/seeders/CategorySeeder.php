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
        $categories=[
            [
                'id' => 1,
                'name' => 'Electronics',
            ],
            [
                'id' => 2,
                'name' => 'Accessories',
            ],
            [
                'id' => 3,
                'name' => 'Home & Living',
            ],
            [
                'id' => 4,
                'name' => 'Clothing',
            ],
            [
                'id' => 5,
                'name' => 'Beauty & Personal Care',
            ],
            [
                'id' => 6,
                'name' => 'Sports & Outdoors',
            ],
        ];
        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
