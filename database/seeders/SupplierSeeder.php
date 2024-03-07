<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class SupplierSeeder extends Seeder
{

    public function run(): void
    {
        DB::table("suppliers")->insert(
            [
                [
                    'name' => 'Supplier',
                    'username' => 'supplier',
                    'email' => 'supplier@gmail.com',
                    'password' => Hash::make('111'),
                    'status' => 'active',
                ]
            ]);

    }
}
