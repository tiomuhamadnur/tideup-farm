<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataWeselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_wesel')->insert(
            [
                // DEPO
                [
                    'id' => 1,
                    'nama_wesel' => 'W5103',
                ],
                [
                    'id' => 2,
                    'nama_wesel' => 'W5104',
                ],
                [
                    'id' => 3,
                    'nama_wesel' => 'W5105a',
                ],
                [
                    'id' => 4,
                    'nama_wesel' => 'W5105b',
                ],
                [
                    'id' => 5,
                    'nama_wesel' => 'W5113',
                ],
                [
                    'id' => 6,
                    'nama_wesel' => 'W5133',
                ],
                [
                    'id' => 7,
                    'nama_wesel' => 'W5134',
                ],
                [
                    'id' => 8,
                    'nama_wesel' => 'W5153',
                ],
                [
                    'id' => 9,
                    'nama_wesel' => 'W5162',
                ],
                [
                    'id' => 10,
                    'nama_wesel' => 'W5202',
                ],
                [
                    'id' => 11,
                    'nama_wesel' => 'W5203',
                ],
                [
                    'id' => 12,
                    'nama_wesel' => 'W5204a',
                ],
                [
                    'id' => 13,
                    'nama_wesel' => 'W5204b',
                ],
                [
                    'id' => 14,
                    'nama_wesel' => 'W5222',
                ],
                [
                    'id' => 15,
                    'nama_wesel' => 'W5223',
                ],
                [
                    'id' => 16,
                    'nama_wesel' => 'W5224',
                ],
                [
                    'id' => 17,
                    'nama_wesel' => 'W5242',
                ],
                [
                    'id' => 18,
                    'nama_wesel' => 'W5243',
                ],
                [
                    'id' => 19,
                    'nama_wesel' => 'W5262',
                ],
                [
                    'id' => 20,
                    'nama_wesel' => 'W5263',
                ],
                [
                    'id' => 21,
                    'nama_wesel' => 'W5282',
                ],
                [
                    'id' => 22,
                    'nama_wesel' => 'W5302',
                ],
                [
                    'id' => 23,
                    'nama_wesel' => 'W5304',
                ],
                [
                    'id' => 24,
                    'nama_wesel' => 'W5303',
                ],
                [
                    'id' => 25,
                    'nama_wesel' => 'W5312',
                ],

                // DAL-LBB
                [
                    'id' => 26,
                    'nama_wesel' => 'W5108',
                ],
                [
                    'id' => 27,
                    'nama_wesel' => 'W5110',
                ],

                // MAINLINE
                // LBB
                [
                    'id' => 28,
                    'nama_wesel' => 'W0103a',
                ],
                [
                    'id' => 29,
                    'nama_wesel' => 'W0103b',
                ],
                [
                    'id' => 30,
                    'nama_wesel' => 'W0104a',
                ],
                [
                    'id' => 31,
                    'nama_wesel' => 'W0104b',
                ],

                // BHI
                [
                    'id' => 32,
                    'nama_wesel' => 'W1303a',
                ],
                [
                    'id' => 33,
                    'nama_wesel' => 'W1303b',
                ],
                [
                    'id' => 34,
                    'nama_wesel' => 'W1304a',
                ],
                [
                    'id' => 35,
                    'nama_wesel' => 'W1304b',
                ],

                // BLM
                [
                    'id' => 36,
                    'nama_wesel' => 'W0603',
                ],
                [
                    'id' => 37,
                    'nama_wesel' => 'W0604',
                ],
                [
                    'id' => 38,
                    'nama_wesel' => 'W0607',
                ],
                [
                    'id' => 39,
                    'nama_wesel' => 'W0608',
                ],
                [
                    'id' => 40,
                    'nama_wesel' => 'W0651',
                ],
                [
                    'id' => 41,
                    'nama_wesel' => 'W0655',
                ],
            ]
        );
    }
}