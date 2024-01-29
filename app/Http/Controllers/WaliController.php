<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Rating;
use App\Models\Semester;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WaliController extends Controller
{
    public function index()
    {
        return view('student', [
            'data' => Siswa::find(auth()->user()->siswa->id)
        ]);
    }

    public function show()
    {
        return view('learning', [
            'data'  =>  Perkembangan::where('siswa_id', auth()->user()->siswa->id)->latest()->simplePaginate(3),
            'siswa' => Siswa::find(auth()->user()->siswa->id)
        ]);
    }

    public function showReport()
    {
        $siswa = Siswa::find(auth()->user()->siswa->id);
        $semester = Semester::latest()->get();
        $tema = Tema::where('semester', $semester->first()->semester);
        $report = $siswa->report->where('status', 'diterima')->where('semester', $semester->first()->semester);
        $rating = Rating::with(['siswa', 'perkembangan'])->where('siswa_id', $siswa->id)->whereRelation('perkembangan', 'semester', $semester->first()->semester);

        if (request('semester')) {
            $tema = Tema::where('semester', request('semester'));
            $report = $siswa->report->where('status', 'diterima')->where('semester', request('semester'));
            $rating = Rating::with(['siswa', 'perkembangan'])->where('siswa_id', $siswa->id)->whereRelation('perkembangan', 'semester', request('semester'));
        }

        // return $rating->get();

        return view('report', [
            'siswa' => $siswa,
            'tema' => $tema->get(),
            'semester' => $semester,
            'raport' => $report->first(),
            'rating' => $rating->get(),
        ]);
    }

    public function showJadwal()
    {
        $jadwal = Jadwal::whereHas('kelompok', function ($query) {
            $query->where('id', auth()->user()->siswa->kelompok_id);
        })->latest()->get();
        // return $jadwal->count();
        return view('jadwal', [
            'jadwal' => $jadwal
        ]);
    }

    public function profile()
    {
        return view('profile', [
            'data' => Siswa::find(auth()->user()->siswa->id)
        ]);
    }

    public function updatePassword(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'password'  => 'required|min:5',
            'newPassword' => 'required|min:5',
            'renewPassword' => 'required|min:5|same:newPassword'
        ]);
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Current Password salah.'
            ]);
        }
        if (Hash::check($request->newPassword, $user->password)) {
            return back()->withErrors([
                'newPassword' => 'New Password tidak boleh sama dengan Current Password.'
            ]);
        }

        $newPassword  =   Hash::make($validatedData['newPassword']);
        User::where('id', $user->id)
            ->update(['password' => $newPassword]);
        $request->session()->flash('success', 'Change Password Success!');
        return redirect('/wali-profile');
    }

    public function uploadImage(Request $request, User $upload)
    {
        $dataUpdate = [
            'photo' => 'image|file|max:1024'

        ];
        $validatedData = $request->validate($dataUpdate);
        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo-user');
        }

        User::where('id', $upload->id)
            ->update([
                'photo' => $validatedData['photo']
            ]);
        $request->session()->flash('success', 'Photo Profile Success Updated!');
        return redirect('/wali-profile');
    }
}
