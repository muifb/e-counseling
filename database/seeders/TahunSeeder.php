<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tahun::create([
            'tahun_ajaran' => '2020/2021'
        ]);
        Tahun::create([
            'tahun_ajaran' => '2021/2022'
        ]);
        Tahun::create([
            'tahun_ajaran' => '2022/2023'
        ]);
    }
}
