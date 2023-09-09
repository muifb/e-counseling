<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Like;
use App\Models\Perkembangan;
use App\Models\Pesan;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.guru.teachers', [
            'data'  => Guru::orderBy('nama_guru')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.guru.add_teachers', [
            'data'  => Guru::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama_guru'  => 'required|max:255',
            'nuptk'  => 'required|unique:guru',
            'devisi' => 'required',
            'tgl_lahir'  => 'required',
            'jk_guru'   => 'required',
            'no_telp'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat'   => 'required',
            'pendidikan'   => 'required',
            'photo' => 'image|file|max:1024'
        ]);

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photo-guru');
        }

        if ($request->devisi == 'Guru') {
            $role = 'guru';
        } elseif ($request->devisi == 'Tatausaha') {
            $role = 'tu';
        } elseif ($request->devisi == 'Kepala Sekolah') {
            $role = 'kepsek';
        }

        $password  =   Hash::make('password');
        $user = User::create([
            'username' => $validatedData['nuptk'],
            'password' => $password,
            'nama' => $validatedData['nama_guru'],
            'role' => $role
        ]);

        $validatedData['user_id'] = $user->id;

        Guru::create($validatedData);
        $request->session()->flash('success', 'Add Teacher Success!');
        return redirect('administrator/teachers/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $teacher)
    {
        return view('dashboard.guru.teacher', [
            'data' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $teacher)
    {
        return view('dashboard.guru.teacher', [
            'data' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuruRequest  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $teacher)
    {
        $dataUpdate = [
            'nama_guru'  => 'required|max:255',
            'devisi' => 'required',
            'tgl_lahir'  => 'required',
            'jk_guru'   => 'required',
            'no_telp'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat'   => 'required',
            'pendidikan'   => 'required',
            'photo' => 'image|file|max:1024'
        ];

        if ($request->nuptk != $teacher->nuptk) {
            $dataUpdate['nuptk']  = 'required|unique:guru';
        }

        $validatedData = $request->validate($dataUpdate);

        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo-guru');
        }

        if ($request->devisi == 'Guru') {
            $role = 'guru';
        } elseif ($request->devisi == 'Tatausaha') {
            $role = 'tu';
        } elseif ($request->devisi == 'Kepala Sekolah') {
            $role = 'kepsek';
        }

        Guru::where('id', $teacher->id)
            ->update($validatedData);

        if ($request->nuptk != $teacher->nuptk) {
            User::where('id', $teacher->user_id)
                ->update([
                    'username' => $validatedData['nuptk'],
                    'nama' => $validatedData['nama_guru'],
                    'role' => $role
                ]);
            return redirect('administrator/teachers')->with('success', 'Edit Teacher Success!');
        }
        User::where('id', $teacher->user_id)
            ->update([
                'nama' => $validatedData['nama_guru'],
                'role' => $role
            ]);
        return redirect('administrator/teachers')->with('success', 'Edit Teacher Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $teacher)
    {
        if ($teacher->photo) {
            Storage::delete($teacher->photo);
        }
        $userId = $teacher->user_id;
        $kelompoks = Kelompok::where('guru_id', $teacher->id)->get();
        foreach ($kelompoks as $kelompok) {
            Kelompok::where('id', $kelompok->id)
                ->update(['guru_id' => null]);
        }
        $jadwals = Jadwal::where('guru_id', $teacher->id)->get();
        foreach ($jadwals as $jadwal) {
            Jadwal::where('id', $jadwal->id)
                ->update(['guru_id' => null]);
        }
        $perkembangans = Perkembangan::where('guru_id', $teacher->id)->get();
        foreach ($perkembangans as $perkembangan) {
            Perkembangan::where('id', $perkembangan->id)
                ->update(['guru_id' => null]);
        }
        $reports = Report::where('guru_id', $teacher->id)->get();
        foreach ($reports as $report) {
            Report::where('id', $report->id)
                ->update(['guru_id' => null]);
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
        Guru::destroy($teacher->id);
        if ($userId != null) {
            if ($teacher->user->photo) {
                Storage::delete($teacher->user->photo);
            }
            User::destroy($userId);
        }
        return redirect('administrator/teachers')->with('success', 'Teacher has been Deleted!');
    }
}
