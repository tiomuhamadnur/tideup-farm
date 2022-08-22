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
                    'name' => 'Dede Irfan',
                    'email' => 'dedeirfan@gmail.com',
                    'role' => 'Staff Maintenance',
                    'password' => Hash::make('admin'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => 'Tio Muhamad Nur',
                    'email' => 'tiomuhamadnur@gmail.com',
                    'role' => 'Staff Maintenance',
                    'password' => Hash::make('admin'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => 'Muhamad Dani Taufiq',
                    'email' => 'tdani@gmail.com',
                    'role' => 'Staff Maintenance',
                    'password' => Hash::make('admin'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'name' => 'Irfan',
                    'email' => 'irfan@gmail.com',
                    'role' => 'Staff Maintenance',
                    'password' => Hash::make('admin'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}