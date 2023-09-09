<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'user_id' => '17',
            'tahun_id' => '3',
            'no_induk' => '22334401',
            'nama' => 'Anastasia Aryani',
            'tempat_lahir' => 'Pagar Alam',
            'tgl_lahir' => '2019-04-10',
            'jk_siswa' => 'Perempuan',
            'alamat' => 'Jr. Hasanuddin No. 6, Pagar Alam 87661, Bengkulu',
            'nama_ortu' => 'Ira Mandasari',
            'no_telp' => '(+62) 299 5562 223',
        ]);
        Siswa::create([
            'user_id' => '18',
            'tahun_id' => '2',
            'no_induk' => '22334402',
            'nama' => 'Cahya Bagya Pranowo',
            'tempat_lahir' => 'Pagar Alam',
            'tgl_lahir' => '2017-04-10',
            'jk_siswa' => 'Laki-Laki',
            'alamat' => 'Jr. Hasanuddin No. 6, Pagar Alam 87661, Bengkulu',
            'nama_ortu' => 'Jati Simanjuntak',
            'no_telp' => '(+62) 299 5562 223',
        ]);
        Siswa::create([
            'user_id' => '19',
            'tahun_id' => '2',
            'no_induk' => '22334403',
            'nama' => 'Ahmad Zakki Fuady',
            'tempat_lahir' => 'Pati',
            'tgl_lahir' => '2018-03-01',
            'jk_siswa' => 'Laki-Laki',
            'alamat' => 'Jimbaran RT 02 RW 03 Kayen Pati Jawa Tengah',
            'nama_ortu' => 'Sri Wahyuningsih',
            'no_telp' => '(+62) 299 5562 223',
        ]);
        Siswa::create([
            'user_id' => '20',
            'tahun_id' => '2',
            'no_induk' => '22334404',
            'nama' => 'Arletha Priska Ayunindya',
            'tempat_lahir' => 'Pati',
            'tgl_lahir' => '2017-05-23',
            'jk_siswa' => 'Perempuan',
            'alamat' => ' Kayen RT 07 RW 04 Kayen Pati Jawa Tengah',
            'nama_ortu' => 'Etikawati Yuni Pratiwi',
            'no_telp' => '(+62) 299 5562 223',
        ]);
    }
}
