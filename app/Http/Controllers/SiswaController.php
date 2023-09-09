<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Pesan;
use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Kelompok;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\NotifikasiWhatsappTrait;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $siswa = Siswa::with('kelompok')->where('status', 'aktif')->orderBy('nama')->get();
        return view('dashboard.siswa.students', [
            'data' => Siswa::with('tahun')->orderBy('nama')->get(),
            'kelompok' => Kelompok::orderBy('nama_kelompok')->get(),
            'tahun' => Tahun::orderByDesc('tahun_ajaran')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jekel = collect([
            ['jk' => 'Laki-Laki'],
            ['jk' => 'Perempuan'],
        ]);
        $status = collect([
            ['sts' => 'aktif'],
            ['sts' => 'pindah'],
            ['sts' => 'lulus']
        ]);
        return view('dashboard.siswa.add_students', [
            'data' => Siswa::latest()->get(),
            'kelompok' => Kelompok::orderBy('nama_kelompok')->get(),
            'tahun' => Tahun::orderByDesc('tahun_ajaran')->get(),
            'jekel' => $jekel,
            'status' => $status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('photo')->store('photo-siswa');
        $validatedData = $request->validate([
            'nama'  => 'required|max:255',
            'no_induk'  => 'required|unique:siswa',
            'status' => 'required|string',
            'tahun_id' => 'required',
            'tempat_lahir'  => 'required|min:3|max:255',
            'tgl_lahir'  => 'required',
            'jk_siswa'   => 'required',
            'alamat'   => 'required',
            'nama_ortu'   => 'required',
            'no_telp'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'photo' => 'image|file|max:1024'
        ]);

        // $count = Siswa::where('kelompok_id', $request->kelompok_id)->count();
        // if ($count >= 25) {
        //     return back()->withErrors([
        //         'kelompok_id' => 'Kelas ini sudah penuh'
        //     ])->withInput($request->old['kelompok_id']);
        // }

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photo-siswa');
        }

        $password  =   Hash::make('password');
        $user = User::create([
            'username' => $validatedData['no_induk'],
            'password' => $password,
            'nama' => $validatedData['nama_ortu'],
            'role' => 'wali'
        ]);

        $validatedData['user_id'] = $user->id;

        $siswa = Siswa::create($validatedData);

        $pesan = [];
        $data['phone'] = $siswa->no_telp;
        $data['message'] = 'Selamat Siang, Siswa dengan nama ' . $siswa->nama . ' telah masuk. Silahkan klik link berikut dan masuk pada akun anda dengan username = ' . $siswa->no_induk . ' dan password = password http://127.0.0.1:8000/ ';
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($pesan, $data);
        NotifikasiWhatsappTrait::sendText($pesan);

        return redirect('/administrator/students/create')->with('success', 'Add Student Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $student)
    {
        return view('dashboard.siswa.student', [
            'data' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $student)
    {
        $jekel = collect([
            ['jk' => 'Laki-Laki'],
            ['jk' => 'Perempuan'],
        ]);
        $status = collect([
            ['sts' => 'aktif'],
            ['sts' => 'pindah'],
            ['sts' => 'lulus']
        ]);
        return view('dashboard.siswa.student', [
            'data' => $student,
            'kelompok' => Kelompok::all(),
            'tahun' => Tahun::orderByDesc('tahun_ajaran')->get(),
            'jekel' => $jekel,
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $student)
    {
        // return $request;
        $dataUpdate = [
            'nama'  => 'required|max:255',
            // 'kelompok_id' => 'required|integer',
            'tahun_id' => 'required',
            'tempat_lahir'  => 'required|min:3|max:255',
            'tgl_lahir'  => 'required',
            'jk_siswa'   => 'required',
            'alamat'   => 'required',
            'status'   => 'required',
            'nama_ortu'   => 'required',
            'no_telp'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'photo' => 'image|file|max:1024'
        ];

        if ($request->kelompok_id) {
            $dataUpdate['kelompok_id'] = 'required|integer';
        }

        if ($request->no_induk != $student->no_induk) {
            $dataUpdate['no_induk']  = 'required|unique:siswa';
        }

        $validatedData = $request->validate($dataUpdate);

        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo-siswa');
        }

        Siswa::where('id', $student->id)
            ->update($validatedData);

        if ($request->no_induk != $student->no_induk) {
            User::where('id', $student->user_id)
                ->update([
                    'username' => $validatedData['no_induk'],
                    'nama' => $validatedData['nama_ortu']
                ]);
            return redirect('/administrator/students')->with('success', 'Edit Student Success!');
        }
        User::where('id', $student->user_id)
            ->update(['nama' => $validatedData['nama_ortu']]);
        return redirect('/administrator/students')->with('success', 'Edit Student Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $student)
    {
        if ($student->photo) {
            Storage::delete($student->photo);
        }
        $userId = $student->user_id;
        $ratings = Rating::where('siswa_id', $student->id)->get();
        foreach ($ratings as $rating) {
            Rating::where('id', $rating->id)
                ->update(['siswa_id' => null]);
        }
        $perkembangans = Perkembangan::where('siswa_id', $student->id)->get();
        foreach ($perkembangans as $perkembangan) {
            Perkembangan::where('id', $perkembangan->id)
                ->update(['siswa_id' => null]);
        }
        $reports = Report::where('siswa_id', $student->id)->get();
        foreach ($reports as $report) {
            Report::where('id', $report->id)
                ->update(['siswa_id' => null]);
        }
        $likes = Like::where('user_id', $userId)->get();
        foreach ($likes as $like) {
            Like::where('id', $like->id)
                ->update(['user_id' => null]);
        }
        $pesans = Pesan::where('user_id', $userId)->get();
        foreach ($pesans as $pesan) {
            Pesan::where('id', $pesan->id)
                ->update(['user_id' => null]);
        }
        Siswa::destroy($student->id);
        if ($userId != null) {
            if ($student->user->photo) {
                Storage::delete($student->user->photo);
            }
            User::destroy($userId);
        }
        return redirect('/administrator/students')->with('success', 'Student has been deleted!');
    }
}
