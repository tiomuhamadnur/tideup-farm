<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert(
            [
                [
                    'id' => 1,
                    'kode' => 'DEPO'
                ],
                [
                    'id' => 2,
                    'kode' => 'DAL-LBB'
                ],
                [
                    'id' => 3,
                    'kode' => 'LBB'
                ],
                [
                    'id' => 4,
                    'kode' => 'BLM'
                ],
                [
                    'id' => 5,
                    'kode' => 'BHI'
                ]
            ]
        );
    }
}