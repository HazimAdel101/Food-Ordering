<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table("users")->insert(
            [
                // Admin
                [
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('111'),
                    'role' => 'admin',
                    'status' => 'active',
                ],
                // Supplier
                [
                    'name' => 'Supplier',
                    'username' => 'supplier',
                    'email' => 'supplier@gmail.com',
                    'password' => Hash::make('111'),
                    'role' => 'supplier',
                    'status' => 'active',
                ],
                // User
                [
                    'name' => 'User',
                    'username' => 'user',
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('111'),
                    'role' => 'user',
                    'status' => 'active',
                ],


            ]
        );
    }
}
