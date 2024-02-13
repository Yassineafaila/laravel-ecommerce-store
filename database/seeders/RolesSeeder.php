<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //here the roles that i will have
        $default = Role::create(['name' => 'client']);
        $admin = Role::create(['name' => 'admin']);


        //this the permission
        $manage_users = Permission::create(['name' => 'manage users']);
        $manage_products = Permission::create(['name' => 'manage products']);
        $manage_categories = Permission::create(['name' => 'manage categories']);

        //array of permission for a admin
        $permissions = [
            $manage_users,
            $manage_categories,
            $manage_products
        ];

        $admin->syncPermissions($permissions);
    }
}
