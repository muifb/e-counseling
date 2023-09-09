<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Kelompok;

class PageController extends Controller
{
    public static function dashboard()
    {

        $kelompok = Kelompok::orderBy('nama_kelompok')->get();
        $jadwal = '';
        $jadwalPendamping = '';
        if (auth()->user()->role == 'guru') {
            $jadwal = Jadwal::whereHas('kelompok', function ($query) {
                $query->where('guru_id', auth()->user()->guru->id)->latest();
            })->latest()->get();
            $jadwalPendamping = Jadwal::where('guru_id', auth()->user()->guru->id)->latest()->get();
        }
        return view('dashboard.pages.home', [
            'data'  => Siswa::with('kelompok')->where('status', 'aktif')->get(),
            'jadwal' => $jadwal,
            'jadwalPendamping' => $jadwalPendamping,
            'kelompok' => $kelompok
        ]);
    }

    public static function galeri()
    {
        return view('dashboard.admin.galeri');
    }

    public static function profile()
    {
        if (auth()->user()->role === 'administrator') {
            return abort(403);
        }
        if (auth()->user()->role !== 'wali') {
            $data = User::find(auth()->user()->id)->guru;
        } else {
            $data = User::find(auth()->user()->id)->siswa;
        }
        return view('dashboard.pages.profile', [
            'data'  => $data
        ]);
    }
}
