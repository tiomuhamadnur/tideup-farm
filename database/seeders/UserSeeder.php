<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Tio Muhamad Nur',
                    'email' => 'tiomuhamadnur@gmail.com',
                    'role' => 'admin',
                    'password' => Hash::make('admin'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => 'Dede Irfan',
                    'email' => 'dedeirfan@gmail.com',
                    'role' => 'investor',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => 'Muhamad Dani Taufiq',
                    'email' => 'mdanytaufiq@gmail.com',
                    'role' => 'investor',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'name' => 'Eko Aditya Susanto',
                    'email' => 'e.adisusanto97@gmail.com',
                    'role' => 'investor',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 5,
                    'name' => 'Johari',
                    'email' => 'johari@gmail.com',
                    'role' => 'pengelola',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}