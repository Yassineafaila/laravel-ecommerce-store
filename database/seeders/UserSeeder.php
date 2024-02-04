<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'firstName' => 'John',
                'lastName' => 'Doe',
                'email' => 'john.doe@email.com',
                'password' => '123456789',
                'address' => '123 Main St, Cityville',
            ],
            [
                'id' => 2,
                'firstName' => 'Jane',
                'lastName' => 'Smith',
                'email' => 'jane.smith@email.com',
                'password' => '123456789',
                'address' => '456 Oak Ave, Townsville',
            ],
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
