<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Seeder;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::create([
            'tahun_id' => '3',
            'nama_tema' => 'Surat - surat pendek',
            'sentra' => 'Meniru dan melafalkan surat Al- Fatikhah',
            'semester' => 'Gasal',
        ]);
        Tema::create([
            'tahun_id' => '3',
            'nama_tema' => 'Membaca',
            'sentra' => 'Puisi dan Mendongeng',
            'semester' => 'Gasal',
        ]);
        Tema::create([
            'tahun_id' => '3',
            'nama_tema' => 'Tanah Airku',
            'sentra' => 'Main peran',
            'semester' => 'Gasal',
        ]);
        Tema::create([
            'tahun_id' => '3',
            'nama_tema' => 'Air',
            'sentra' => 'Lingkungan Sekitar',
            'semester' => 'Gasal',
        ]);
        Tema::create([
            'tahun_id' => '3',
            'nama_tema' => 'Mengenal Manusia ciptaan Tuhan',
            'sentra' => 'Anak Mengetahui Tuhan sebagai Pencipta',
            'semester' => 'Gasal',
        ]);
        Tema::create([
            'tahun_id' => '3',
            'nama_tema' => 'Bercerita',
            'sentra' => 'Mendengarkan Cerita Guru',
            'semester' => 'Gasal',
        ]);
    }
}
