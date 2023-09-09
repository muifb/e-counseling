<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'kepala.sekolah',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Risna Nurul Fadlilah, S.Psi',
            'role' => 'kepsek',
        ]);
        User::create([
            'username' => 'tatausaha',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Larasati Wahyuni S.Pd',
            'role' => 'tu',
        ]);
        User::create([
            'username' => 'guru',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Umi Chamidah',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664706',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Himmatul Aliyah',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664707',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Eka Andiyani',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664708',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Ifa Karniawani',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664709',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Ika Anisatun Nuriyah',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664710',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Siti Farida Hasanah',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664711',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Hidayatul Kamal',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664712',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Miratun Nisa',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664713',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Mutmainnah',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664714',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Masrini',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664715',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Suhartini',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664716',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Dwi Kartiniati',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664717',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Siti Rukayati',
            'role' => 'guru',
        ]);
        User::create([
            'username' => '907664718',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Ara Liani',
            'role' => 'guru',
        ]);
        User::create([
            'username' => 'wali.murid',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Ira Mandasari',
            'role' => 'wali',
        ]);

        User::create([
            'username' => '22334402',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Jati Simanjuntak',
            'role' => 'wali',
        ]);
        User::create([
            'username' => '22334403',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Sri Wahyuningsih',
            'role' => 'wali',
        ]);
        User::create([
            'username' => '22334404',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama' => 'Etikawati Yuni Pratiwi',
            'role' => 'wali',
        ]);
    }
}
