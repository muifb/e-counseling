<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Kelompok;
use App\Models\Semester;
use App\Models\DetailReport;
use App\Models\Guru;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\NotifikasiWhatsappTrait;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Kelompok::with('report')->get();
        return view('dashboard.rapor.request', [
            // 'reports' => Report::where('status', false)->get(),
            'reports' => Kelompok::with('report')->get(),
            'kelompok' => Kelompok::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'semester' => 'required',
            'nilai_agama' => 'required',
            'motorik' => 'required',
            'kognitif' => 'required',
            'sosial' => 'required',
            'bahasa' => 'required',
            'seni' => 'required',
            'photo_agama.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_motorik.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_kognitif.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_sosial.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_bahasa.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_seni.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
        ]);

        $validatedData['siswa_id'] = $request['siswa_id'];
        // $validatedData['kelompok_id'] = $request['kelompok_id'];
        $validatedData['guru_id'] = Auth::user()->guru->id;
        $cekReport = Report::where('siswa_id', $validatedData['siswa_id'])->get();
        $siswa = Siswa::find($request['siswa_id']);

        if ($cekReport->count()) {
            foreach ($cekReport as $cek) {
                if ($validatedData['siswa_id'] == $cek->siswa_id && $validatedData['semester'] == $cek->semester) {
                    if ($cek->status == 'menunggu') {
                        return back()
                            ->withErrors(['semester' => 'Raport siswa ' . $siswa->nama . ' semester ' . $validatedData['semester'] . ' sudah diinputkan dan menunggu persetujuan!.'])
                            ->withInput($validatedData);
                    } else {
                        return back()
                            ->withErrors(['semester' => 'Raport siswa ' . $siswa->nama . ' semester ' . $validatedData['semester'] . ' sudah diinputkan dan diterima!.'])
                            ->withInput($validatedData);
                    }
                }
            }
        }

        $report = Report::create($validatedData);
        $imagesagama = $request->file('photo_agama');
        if ($request->hasFile('photo_agama')) {
            foreach ($imagesagama as $imgAgama) {
                $type = $imgAgama->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoAgama = $imgAgama->store('files-reports/video/nilai-agama');
                    DetailReport::create([
                        'file_fotovideo' => $videoAgama,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageAgama = $imgAgama->store('files-reports/image/nilai-agama');
                    DetailReport::create([
                        'file_fotovideo' => $imageAgama,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagesmotorik = $request->file('photo_motorik');
        if ($request->hasFile('photo_motorik')) {
            foreach ($imagesmotorik as $imgMotorik) {
                $type = $imgMotorik->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoMotorik = $imgMotorik->store('files-reports/video/nilai-motorik');
                    DetailReport::create([
                        'file_fotovideo' => $videoMotorik,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageMotorik = $imgMotorik->store('files-reports/image/nilai-motorik');
                    DetailReport::create([
                        'file_fotovideo' => $imageMotorik,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imageskognitif = $request->file('photo_kognitif');
        if ($request->hasFile('photo_kognitif')) {
            foreach ($imageskognitif as $imgKognitif) {
                $type = $imgKognitif->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoKognitif = $imgKognitif->store('files-reports/video/nilai-kognitif');
                    DetailReport::create([
                        'file_fotovideo' => $videoKognitif,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageKognitif = $imgKognitif->store('files-reports/image/nilai-kognitif');
                    DetailReport::create([
                        'file_fotovideo' => $imageKognitif,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagessosial = $request->file('photo_sosial');
        if ($request->hasFile('photo_sosial')) {
            foreach ($imagessosial as $imgSosial) {
                $type = $imgSosial->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoSosial = $imgSosial->store('files-reports/video/nilai-sosial');
                    DetailReport::create([
                        'file_fotovideo' => $videoSosial,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageSosial = $imgSosial->store('files-reports/image/nilai-sosial');
                    DetailReport::create([
                        'file_fotovideo' => $imageSosial,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagesbahasa = $request->file('photo_bahasa');
        if ($request->hasFile('photo_bahasa')) {
            foreach ($imagesbahasa as $imgBahasa) {
                $type = $imgBahasa->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoBahasa = $imgBahasa->store('files-reports/video/nilai-bahasa');
                    DetailReport::create([
                        'file_fotovideo' => $videoBahasa,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageBahasa = $imgBahasa->store('files-reports/image/nilai-bahasa');
                    DetailReport::create([
                        'file_fotovideo' => $imageBahasa,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagesseni = $request->file('photo_seni');
        if ($request->hasFile('photo_seni')) {
            foreach ($imagesseni as $imgSeni) {
                $type = $imgSeni->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoSeni = $imgSeni->store('files-reports/video/nilai-seni');
                    DetailReport::create([
                        'file_fotovideo' => $videoSeni,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageSeni = $imgSeni->store('files-reports/image/nilai-seni');
                    DetailReport::create([
                        'file_fotovideo' => $imageSeni,
                        'report_id' => $report->id
                    ]);
                }
            }
        }

        $kepsek = Guru::where('devisi', 'Kepala Sekolah')->get();
        // return $kepsek->first()->no_telp;
        $pesan = [];
        $data['phone'] = $kepsek->first()->no_telp;
        $data['message'] = 'Selamat siang, Ada nilai rapor yang menunggu persetujuan. Silahkan buka sistem konseling pada website dengan cara klik link berikut kemudian masukkan username dan password yang anda miliki http://127.0.0.1:8000/ ';
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($pesan, $data);
        NotifikasiWhatsappTrait::sendText($pesan);

        $request->session()->flash('success', 'Add Report Ananda : ' . $siswa->nama . ' Success!');
        return redirect('/dashboard/learnings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $semester = Semester::latest()->get();
        $tema = Tema::where('semester', $semester->first()->semester)->get();
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)->where('semester', $semester->first()->semester)->get();
        $report = $siswa->report->first();
        if ($report && $report->status == 'menunggu') {
            return view('dashboard.rapor.status_report', [
                'siswa' => $siswa,
                'status' => 'menunggu',
                'semester' => $report,
                'report' => $report
            ]);
        } elseif ($report && $report->status == 'ditolak') {
            return view('dashboard.rapor.status_report', [
                'siswa' => $siswa,
                'status' => 'ditolak',
                'semester' => $report,
                'report' => $report
            ]);
        } elseif ($report && $report->status == 'diterima' && $report->semester == $semester->first()->semester) {
            return view('dashboard.rapor.status_report', [
                'siswa' => $siswa,
                'status' => 'diterima',
                'semester' => $semester->first(),
            ]);
        }

        if ($tema->count() == 0) {
            return view('dashboard.rapor.status_report', [
                'siswa' => $siswa,
                'status' => 'info',
                'semester' => $semester->first(),
            ]);
        }

        foreach ($tema as $item) {
            if ($perkembangan->where('tema_id', $item->id)->count() < 3 || $perkembangan->where('tema_id', $item->id)->count() == 0) {
                return view('dashboard.rapor.status_report', [
                    'status' => 'peringatan',
                    'siswa' => $siswa,
                    'tema' => $item->nama_tema,
                    'semester' => $semester->first(),
                ]);
            }
        }

        return view('dashboard.rapor.add_report', [
            'data' => $siswa,
            // 'tema' => $tema,
            'semester' => $semester,
            'report' => $report
        ]);
    }

    public function showReports(Kelompok $kelompok)
    {
        // return $kelompok;
        return view('dashboard.rapor.detail_reports', [
            'kelompok' => $kelompok,
        ]);
    }

    public function showReport(Report $report)
    {
        // return $report;
        return view('dashboard.rapor.detail_report', [
            'report' => $report,
        ]);
    }

    public function acceptAll(Request $request)
    {
        // return $request;
        $validate = $request->validate([
            'id.*' => 'required',
        ]);
        $id = $validate['id'];
        foreach ($id as $d) {
            Report::where('id', $d)
                ->update([
                    'status' => 'diterima'
                ]);

            $report = Report::find($d);
            $siswa = Siswa::find($report->siswa_id);
            $pesan = [];
            $data['phone'] = $siswa->no_telp;
            $data['message'] = 'Selamat siang, nilai rapor telah dibagikan. Silahkan buka sistem konseling pada website dengan cara klik link berikut kemudian masukkan username dan password yang anda miliki http://127.0.0.1:8000/ ';
            $data['secret'] = false;
            $data['retry'] = false;
            $data['isGroup'] = false;
            array_push($pesan, $data);
            NotifikasiWhatsappTrait::sendText($pesan);
        }
        return redirect('/dashboard/request-reports')->with('success', 'Permintaan Rapor diterima! ');
    }
    public function accept(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'kelompok_id' => 'required',
        ]);

        Report::where('id', $validate['id'])
            ->update(['status' => 'diterima']);

        $report = Report::find($validate['id']);
        $siswa = Siswa::find($report->siswa_id);
        $pesan = [];
        $data['phone'] = $siswa->no_telp;
        $data['message'] = 'Selamat siang, nilai rapor telah dibagikan. Silahkan buka sistem konseling pada website dengan cara klik link berikut kemudian masukkan username dan password yang anda miliki http://127.0.0.1:8000/ ';
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($pesan, $data);
        NotifikasiWhatsappTrait::sendText($pesan);

        return redirect('/dashboard/request-reports/detail-reports/' . $validate['kelompok_id'])->with('success', 'Permintaan Rapor diterima! ');
    }

    public function reject(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'kelompok_id' => 'required',
            'saran' => 'required'
        ]);

        Report::where('id', $validate['id'])
            ->update([
                'saran' => $validate['saran'],
                'status' => 'ditolak'
            ]);

        $report = Report::find($validate['id']);
        $nomor = $report->guru;
        // return $nomor->no_telp;
        $pesan = [];
        $data['phone'] = $nomor->no_telp;
        $data['message'] = 'Selamat siang, nilai rapor yang anda ajukan telah ditolak. Silahkan buka sistem konseling pada website dengan cara klik link berikut kemudian masukkan username dan password yang anda miliki http://127.0.0.1:8000/ ';
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($pesan, $data);
        NotifikasiWhatsappTrait::sendText($pesan);

        return redirect('/dashboard/request-reports/detail-reports/' . $validate['kelompok_id'])->with('success', 'Permintaan Rapor ditolak! ');
    }

    public function edit(Report $report)
    {
        return view('dashboard.rapor.edit_report', [
            'report' => $report,
            'tahun' => Tahun::orderBy('tahun_ajaran')->get()
        ]);
    }

    public function update(Request $request, Report $report)
    {
        $validatedData = $request->validate([
            'semester' => 'required',
            'nilai_agama' => 'required',
            'motorik' => 'required',
            'kognitif' => 'required',
            'sosial' => 'required',
            'bahasa' => 'required',
            'seni' => 'required',
            'photo_agama.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_motorik.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_kognitif.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_sosial.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_bahasa.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
            'photo_seni.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp',
        ]);

        $validatedData['siswa_id'] = $request['siswa_id'];
        $validatedData['guru_id'] = Auth::user()->guru->id;
        $validatedData['status'] = 'menunggu';
        // $validatedData['kelompok_id'] = $request['kelompok_id'];
        $cekReport = Report::where('siswa_id', $validatedData['siswa_id'])->get();
        $siswa = Siswa::find($request['siswa_id']);

        // if ($cekReport->count()) {
        //     foreach ($cekReport as $cek) {
        //         if ($validatedData['siswa_id'] == $cek->siswa_id && $validatedData['semester'] == $cek->semester) {
        //             if ($cek->status == 'menunggu') {
        //                 return back()
        //                     ->withErrors(['semester' => 'Raport siswa ' . $siswa->nama . ' semester ' . $validatedData['semester'] . ' sudah diinputkan dan menunggu persetujuan!.'])
        //                     ->withInput($validatedData);
        //             } else {
        //                 return back()
        //                     ->withErrors(['semester' => 'Raport siswa ' . $siswa->nama . ' semester ' . $validatedData['semester'] . ' sudah diinputkan!.'])
        //                     ->withInput($validatedData);
        //             }
        //         }
        //     }
        // }

        Report::where('id', $report->id)
            ->update([
                'siswa_id' => $validatedData['siswa_id'],
                'guru_id' => $validatedData['guru_id'],
                'semester' => $validatedData['semester'],
                'nilai_agama' => $validatedData['nilai_agama'],
                'motorik' => $validatedData['motorik'],
                'kognitif' => $validatedData['kognitif'],
                'sosial' => $validatedData['sosial'],
                'bahasa' => $validatedData['bahasa'],
                'seni' => $validatedData['seni'],
                'status' => $validatedData['status'],
            ]);
        $imagesagama = $request->file('photo_agama');
        if ($request->hasFile('photo_agama')) {
            foreach ($imagesagama as $imgAgama) {
                $type = $imgAgama->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoAgama = $imgAgama->store('files-reports/video/nilai-agama');
                    DetailReport::create([
                        'file_fotovideo' => $videoAgama,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageAgama = $imgAgama->store('files-reports/image/nilai-agama');
                    DetailReport::create([
                        'file_fotovideo' => $imageAgama,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagesmotorik = $request->file('photo_motorik');
        if ($request->hasFile('photo_motorik')) {
            foreach ($imagesmotorik as $imgMotorik) {
                $type = $imgMotorik->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoMotorik = $imgMotorik->store('files-reports/video/nilai-motorik');
                    DetailReport::create([
                        'file_fotovideo' => $videoMotorik,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageMotorik = $imgMotorik->store('files-reports/image/nilai-motorik');
                    DetailReport::create([
                        'file_fotovideo' => $imageMotorik,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imageskognitif = $request->file('photo_kognitif');
        if ($request->hasFile('photo_kognitif')) {
            foreach ($imageskognitif as $imgKognitif) {
                $type = $imgKognitif->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoKognitif = $imgKognitif->store('files-reports/video/nilai-kognitif');
                    DetailReport::create([
                        'file_fotovideo' => $videoKognitif,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageKognitif = $imgKognitif->store('files-reports/image/nilai-kognitif');
                    DetailReport::create([
                        'file_fotovideo' => $imageKognitif,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagessosial = $request->file('photo_sosial');
        if ($request->hasFile('photo_sosial')) {
            foreach ($imagessosial as $imgSosial) {
                $type = $imgSosial->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoSosial = $imgSosial->store('files-reports/video/nilai-sosial');
                    DetailReport::create([
                        'file_fotovideo' => $videoSosial,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageSosial = $imgSosial->store('files-reports/image/nilai-sosial');
                    DetailReport::create([
                        'file_fotovideo' => $imageSosial,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagesbahasa = $request->file('photo_bahasa');
        if ($request->hasFile('photo_bahasa')) {
            foreach ($imagesbahasa as $imgBahasa) {
                $type = $imgBahasa->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoBahasa = $imgBahasa->store('files-reports/video/nilai-bahasa');
                    DetailReport::create([
                        'file_fotovideo' => $videoBahasa,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageBahasa = $imgBahasa->store('files-reports/image/nilai-bahasa');
                    DetailReport::create([
                        'file_fotovideo' => $imageBahasa,
                        'report_id' => $report->id
                    ]);
                }
            }
        }
        $imagesseni = $request->file('photo_seni');
        if ($request->hasFile('photo_seni')) {
            foreach ($imagesseni as $imgSeni) {
                $type = $imgSeni->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $videoSeni = $imgSeni->store('files-reports/video/nilai-seni');
                    DetailReport::create([
                        'file_fotovideo' => $videoSeni,
                        'report_id' => $report->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $imageSeni = $imgSeni->store('files-reports/image/nilai-seni');
                    DetailReport::create([
                        'file_fotovideo' => $imageSeni,
                        'report_id' => $report->id
                    ]);
                }
            }
        }

        $kepsek = Guru::where('devisi', 'Kepala Sekolah')->get();
        // return $kepsek->first()->no_telp;
        $pesan = [];
        $data['phone'] = $kepsek->first()->no_telp;
        $data['message'] = 'Selamat siang, Ada nilai rapor yang menunggu persetujuan. Silahkan buka sistem konseling pada website dengan cara klik link berikut kemudian masukkan username dan password yang anda miliki http://127.0.0.1:8000/ ';
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($pesan, $data);
        NotifikasiWhatsappTrait::sendText($pesan);

        $request->session()->flash('success', 'Ubah Rapor Ananda : ' . $siswa->nama . ' Success!');
        return redirect('/dashboard/learnings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Report::destroy($report->id);
        return back()->with('success', 'Report has been rejected!');
    }
}
