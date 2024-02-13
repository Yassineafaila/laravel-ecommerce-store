<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //Admin User
        $admin_user = new User();
        $admin_user->firstName = "yassine";
        $admin_user->lastName = "af";
        $admin_user->email = "yassine@gmail.com";
        $admin_user->address = "agadir,morocco";
        $admin_user->password = Hash::make("1234admin");
        $admin_user->save();
        $admin_user->assignRole("admin");

        //Regular Users
        $users = [
            [
                'id' => 2,
                'firstName' => 'John',
                'lastName' => 'Doe',
                'email' => 'john.doe@email.com',
                'password' => '123456789',
                'address' => '123 Main St, Cityville',
            ],
            [
                'id' => 3,
                'firstName' => 'Jane',
                'lastName' => 'Smith',
                'email' => 'jane.smith@email.com',
                'password' => '123456789',
                'address' => '456 Oak Ave, Townsville',
            ],
        ];
        foreach ($users as $key => $value) {
            $user
                = User::create($value);
            $user->assignRole("client");
        }
    }
}
