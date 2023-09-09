<?php

namespace Database\Seeders;

use App\Models\Kelompok;
use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelompok::create([
            'tahun_id' => '3',
            'guru_id' => '3',
            'nama_kelompok' => 'A-1'
        ]);
        Kelompok::create([
            'tahun_id' => '3',
            'guru_id' => '6',
            'nama_kelompok' => 'A-2'
        ]);
        Kelompok::create([
            'tahun_id' => '3',
            'guru_id' => '7',
            'nama_kelompok' => 'B-1'
        ]);
        Kelompok::create([
            'tahun_id' => '3',
            'guru_id' => '4',
            'nama_kelompok' => 'B-2'
        ]);
    }
}
