<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Smart Watch',
                'description' => 'Fitness tracker with heart rate monitor',
                'price' => 49.99,
                'stockQuantity' => 100,
                "rating" => 4.5,
                'image' => 'images/smart-watch.png',
            ],
            [
                'id' => 2,
                'name' => 'Wireless Earbuds',
                'description' => 'Bluetooth earbuds with noise cancellation',
                'price' => 79.99,
                'stockQuantity' => 50,
                "rating" => 4.5,
                'image' => 'images/wirless-airpods.png',
            ],
            [
                'id' => 3,
                'name' => 'Laptop Backpack',
                'description' => 'Stylish backpack with padded laptop compartment',
                'price' => 29.99,
                'stockQuantity' => 75,
                "rating" => 4.5,
                'image' => 'images/laptop-backpack.png',
            ],
            [
                'id' => 4,
                'name' => 'Coffee Maker',
                'description' => 'Programmable coffee maker with built-in grinder',
                'price' => 89.99,
                'stockQuantity' => 30,
                "rating" => 4.5,
                'image' => 'images/coffee-maker.png',
            ],
            [
                'id' => 5,
                'name' => '4K Ultra HD Smart TV',
                'description' => 'Smart TV with 4K resolution and smart features',
                'price' => 599.99,
                'stockQuantity' => 20,
                'rating' => 4.7,
                'image' => 'images/smart-tv.png',
            ],
            [
                'id' => 6,
                'name' => 'Smart Home Security Camera',
                'description' => 'Wireless security camera with motion detection',
                'price' => 129.99,
                'stockQuantity' => 40,
                'rating' => 4.6,
                'image' => 'images/Wireless-security-camera.png',
            ],
            [
                'id' => 7,
                'name' => 'Gaming Laptop',
                'description' => 'High-performance laptop for gaming enthusiasts',
                'price' => 1299.99,
                'stockQuantity' => 15,
                'rating' => 4.8,
                'image' => 'images/pc-gaming.png',
            ],
            [
                'id' => 8,
                'name' => 'Wireless Charging Pad',
                'description' => 'Qi-enabled wireless charging pad for smartphones',
                'price' => 39.99,
                'stockQuantity' => 60,
                'rating' => 4.3,
                'image' => 'images/wireless-charging-smartphones.png',
            ],
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
