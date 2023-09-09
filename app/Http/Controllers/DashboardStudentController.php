<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Siswa;
use App\Models\Rating;
use App\Models\Kelompok;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Models\Detailperkembangan;
use App\Models\Jadwal;
use App\Traits\NotifikasiWhatsappTrait;
use PhpParser\Node\Stmt\Return_;

class DashboardStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::whereNotNull('kelompok_id')->where('status', 'aktif')->orderBy('nama')->get();
        $kelompok = Kelompok::orderBy('nama_kelompok')->get();
        if (auth()->user()->role === 'guru') {
            $kelompok = Kelompok::where('guru_id', auth()->user()->guru->id)->orderBy('nama_kelompok')->get();
            $jadwal = Jadwal::where('guru_id', auth()->user()->guru->id)->latest()->get();
            if ($jadwal->count()) {
                $kelompok[] = $jadwal->first()->kelompok;
            }
        }
        // return $kelompok;
        return view('dashboard.pages.learning', [
            'data' => $siswa,
            'kelompok' => $kelompok
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tanggal' => 'required',
            'tema_id' => 'required',
            'keterangan' => 'required|min:5',
            'star_rated' => 'required',
            'photo.*' => 'mimes:mp4,mp4v,mpg4,avi,movie,mov,jpg,jpeg,png,gif,svg,webp'
        ]);


        $validatedData['siswa_id'] = $request['siswa_id'];
        $validatedData['guru_id'] = auth()->user()->guru->id;
        $validatedData['status_perkembangan'] = 'NULL';

        $tema = Tema::find($request['tema_id']);
        $Perkembangan = Perkembangan::create($validatedData);
        $images = $request->file('photo');
        if ($request->hasFile('photo')) {
            foreach ($images as $img) {
                $type = $img->getMimeType();
                if ($type == 'video/mp4' || $type == 'video/mp4v' || $type == 'video/mpg4' || $type == 'video/avi' || $type == 'video/movie' || $type == 'video/mov') {
                    $video = $img->store('files-perkembangan/video');
                    Detailperkembangan::create([
                        'video' => $video,
                        'perkembangan_id' => $Perkembangan->id
                    ]);
                }
                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/svg' || $type == 'image/webp') {
                    $image = $img->store('files-perkembangan/image');
                    Detailperkembangan::create([
                        'image' => $image,
                        'perkembangan_id' => $Perkembangan->id
                    ]);
                }
            }
        }
        Rating::create([
            'perkembangan_id' => $Perkembangan->id,
            'siswa_id' => $validatedData['siswa_id'],
            'tema_id' => $validatedData['tema_id'],
            'star_rated' => $validatedData['star_rated']
        ]);

        $notelf = Siswa::find($request->siswa_id);
        $pesan = [];
        $data['phone'] = $notelf->no_telp;
        $data['message'] = 'Selamat Siang, Informasi perkembangan anak telah di perbarui. Silahkan klik link berikut dan masuk pada akun anda untuk melihat perkembangan hari ini http://127.0.0.1:8000/ ';
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($pesan, $data);
        NotifikasiWhatsappTrait::sendText($pesan);

        $request->session()->flash('success', 'Add Perkembangan Tema : ' . $tema->nama_tema . ' Success!');
        return redirect('/dashboard/learnings/add-detail/' . $request['siswa_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $learning)
    {
        return view('dashboard.pages.detail_conselling', [
            'data'  =>  Perkembangan::where('siswa_id', $learning->id)->latest()->simplePaginate(3),
            'siswa' =>  $learning
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Perkembangan $learning)
    {
        // return $learning;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $student)
    {
        //
    }
}
