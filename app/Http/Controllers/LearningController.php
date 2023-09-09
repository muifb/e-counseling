<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Guru;
use App\Models\Kelompok;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\Tema;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class LearningController extends Controller
{
    public function index()
    {
    }

    public function show(Siswa $siswa)
    {
        return view('dashboard.pages.add_detail', [
            'data' => $siswa,
            'tema' => Tema::all()
        ]);
    }

    public function showReport(Siswa $siswa)
    {
        return view('dashboard.rapor.report', [
            'siswa' => $siswa,
            'tema' => Tema::all(),
            'rating' => Rating::with(['siswa'])->where('siswa_id', $siswa->id)->get()
        ]);
    }

    public function print(Request $request)
    {
        $print = Report::with(['siswa', 'guru'])->find($request->id);
        $kepsek = Guru::where('devisi', 'Kepala Sekolah')->latest()->get();
        return view('cetak.print', [
            'raport' => $print,
            'kepsek' => $kepsek
        ]);
    }

    public function evaluasi()
    {
        // return Tahun::with('kelompok')->orderBy('tahun_ajaran')->get();
        return view('dashboard.evaluasi.evaluasi_pembelajaran', [
            'tahun' => Tahun::with('kelompok')->orderByDesc('tahun_ajaran')->get()
        ]);
    }

    public function kelompok(Tahun $tahun)
    {
        return view('dashboard.evaluasi.evaluasi_kelompok', [
            'kelompok' => Kelompok::where('tahun_id', $tahun->id)->get(),
            'tahun' => $tahun
        ]);
    }

    public function siswas(Kelompok $kelompok)
    {
        return view('dashboard.evaluasi.evaluasi_siswa', [
            'siswa' => Siswa::where('kelompok_id', $kelompok->id)->get(),
            'kelompok' => $kelompok
        ]);
    }
}
