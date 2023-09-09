<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'niken.putri',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Niken Anggita Putri',
            'role' => 'administrator',
        ]);
        // $this->call([
        //     TahunSeeder::class,
        //     UserSeeder::class,
        //     GuruSeeder::class,
        //     SiswaSeeder::class,
        //     TemaSeeder::class,
        //     KelompokSeeder::class
        // ]);
    }
}
