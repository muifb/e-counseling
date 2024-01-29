<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Guru;
use App\Models\Kelompok;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Semester;
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
        $semester = Semester::latest()->get();
        $tema = Tema::where('semester', $semester->first()->semester);
        return view('dashboard.pages.add_perkembangan', [
            'data' => $siswa,
            'tema' => $tema->get(),
            'semester' => $semester
        ]);
    }

    public function showReport(Siswa $siswa)
    {
        $semester = Semester::latest()->get();
        $tema = Tema::where('semester', $semester->first()->semester);
        $report = $siswa->report->where('status', 'diterima')->where('semester', $semester->first()->semester);
        $rating = Rating::with(['siswa', 'perkembangan'])->where('siswa_id', $siswa->id)->whereRelation('perkembangan', 'semester', $semester->first()->semester);

        if (request('semester')) {
            $tema = Tema::where('semester', request('semester'));
            $report = $siswa->report->where('status', 'diterima')->where('semester', request('semester'));
            $rating = Rating::with(['siswa', 'perkembangan'])->where('siswa_id', $siswa->id)->whereRelation('perkembangan', 'semester', request('semester'));
        }
        // return $tema->get();

        return view('dashboard.rapor.report', [
            'siswa' => $siswa,
            'tema' => $tema->get(),
            'semester' => $semester,
            'raport' => $report->first(),
            'rating' => $rating->get()
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
            'tahun' => Tahun::with('kelompok')->orderBy('tahun_ajaran')->get()
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
