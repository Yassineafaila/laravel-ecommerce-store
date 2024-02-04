<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'id' => 1,
                'product_id' => 1,
                'user_id' => 1,
                'rating' => 4,
                'comment' => 'Great features and accurate heart rate monitoring.',

            ],
            [
                'id' => 2,
                'product_id' => 2,
                'user_id' => 2,
                'rating' => 5,
                'comment' => 'Excellent sound quality and comfortable fit.',

            ],
            [
                'id' => 3,
                'product_id' => 3,
                'user_id' => 1,
                'rating' => 4,
                'comment' => 'Spacious compartments, perfect for my laptop.',

            ],
            [
                'id' => 4,
                'product_id' => 4,
                'user_id' => 2,
                'rating' => 4,
                'comment' => 'Love the convenience of grinding fresh coffee beans.',

            ],
        ];
        foreach ($reviews as $key => $value) {
            Review::create($value);
        }
    }
}
