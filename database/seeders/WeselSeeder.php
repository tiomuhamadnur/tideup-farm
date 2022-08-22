<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wesel')->insert(
            [
                [
                    'id' => 1,
                    "user_id" => 1,
                    "nama_tim_2" => 'Tio Muhamad Nur',
                    "nama_tim_3" => 'Hawasi',
                    "nama_tim_4" => 'Irfan',
                    "nama_line" => 'UT',
                    "nama_stasiun" => 'DAL-TB',
                    "nama_wesel" => 'W5108',
                    "tanggal_kerja" => now(),
                    "TG_1" => '1067',
                    "CL_1" => '1',
                    "TG_2" => '1067',
                    "CL_2" => '1',
                    "TG_2A" => '1067',
                    "CL_2A" => '1',
                    "TG_2AA" => '1067',
                    "CL_2AA" => '1',
                    "TG_3" => '1067',
                    "CL_3" => '1',
                    "TG_3A" => '1067',
                    "CL_3A" => '1',
                    "CL_4" => '1',
                    "TG_4A" => '1067',
                    "CL_4A" => '1',
                    "TG_5" => '1067',
                    "CL_5" => '1',
                    "TG_5A" => '1067',
                    "CL_5A" => '1',
                    "TG_6A" => '1067',
                    "TG_7" => '1067',
                    "CL_7" => '1',
                    "TG_7A" => '1067',
                    "CL_7A" => '1',
                    "BG_8" => '1025',
                    "CL_8" => '1',
                    "BG_8A" => '1025',
                    "CL_8A" => '1',
                    "TG_10" => '1067',
                    "CL_10" => '1',
                    "TG_10A" => '1067',
                    "CL_10A" => '1',
                    "LL_2" => '1',
                    "AL_2" => '1',
                    "LL_5" => '1',
                    "AL_5" => '1',
                    "LL_5A" => '1',
                    "AL_5A_1per2" => '55',
                    "AL_5A_1per4" => '46',
                    "AL_5A_3per4" => '46',
                    "LL_9" => '1',
                    "AL_9" => '1',
                    'foto_kegiatan_1' => 'foto_kegiatan_1',
                    'foto_kegiatan_2' => 'foto_kegiatan_2',
                ],
                [
                    'id' => 2,
                    "user_id" => 1,
                    "nama_tim_2" => 'Tio Muhamad Nur',
                    "nama_tim_3" => 'Hawasi',
                    "nama_tim_4" => 'Irfan',
                    "nama_line" => 'UT',
                    "nama_stasiun" => 'DAL-TB',
                    "nama_wesel" => 'W5108',
                    "tanggal_kerja" => now(),
                    "TG_1" => '1067',
                    "CL_1" => '1',
                    "TG_2" => '1067',
                    "CL_2" => '1',
                    "TG_2A" => '1067',
                    "CL_2A" => '1',
                    "TG_2AA" => '1067',
                    "CL_2AA" => '1',
                    "TG_3" => '1067',
                    "CL_3" => '1',
                    "TG_3A" => '1067',
                    "CL_3A" => '1',
                    "CL_4" => '1',
                    "TG_4A" => '1067',
                    "CL_4A" => '1',
                    "TG_5" => '1067',
                    "CL_5" => '1',
                    "TG_5A" => '1067',
                    "CL_5A" => '1',
                    "TG_6A" => '1067',
                    "TG_7" => '1067',
                    "CL_7" => '1',
                    "TG_7A" => '1067',
                    "CL_7A" => '1',
                    "BG_8" => '1025',
                    "CL_8" => '1',
                    "BG_8A" => '1025',
                    "CL_8A" => '1',
                    "TG_10" => '1067',
                    "CL_10" => '1',
                    "TG_10A" => '1067',
                    "CL_10A" => '1',
                    "LL_2" => '1',
                    "AL_2" => '1',
                    "LL_5" => '1',
                    "AL_5" => '1',
                    "LL_5A" => '1',
                    "AL_5A_1per2" => '55',
                    "AL_5A_1per4" => '46',
                    "AL_5A_3per4" => '46',
                    "LL_9" => '1',
                    "AL_9" => '1',
                    'foto_kegiatan_1' => 'foto_kegiatan_1',
                    'foto_kegiatan_2' => 'foto_kegiatan_2',
                ]
            ]
        );
    }
}