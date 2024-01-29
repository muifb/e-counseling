<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Tema;
use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\Jadwal;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\KelompokSiswa;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Traits\NotifikasiWhatsappTrait;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  tampilan halaman jadwal
    public function create()
    {

        // return date('l');
        // if (date('l') == 'Tuesday') {
        // if (date('l') == 'Wednesday') {
        if (date('l') == 'Thursday') {
            $tahun = Tahun::orderBy('tahun_ajaran')->get();
            $kelompok = Kelompok::orderBy('nama_kelompok')->get();
            if ($tahun->count()) {
                $kelompok = Kelompok::where('tahun_id', $tahun->last()->id)->orderBy('nama_kelompok')->get();
            }
            // $kelompok = Kelompok::orderBy('nama_kelompok')->get();
            // $g = [];
            // if ($kelompok->count()) {
            //     foreach ($kelompok as $kel) {
            //         if ($kel->guru_id != null) {
            //             $g[] = $kel->guru_id;
            //         }
            //     }
            // }
            // $guru = Guru::whereNotIn('id', $g)->where('devisi', 'Guru')->get();
            $guru = Guru::where('devisi', 'Guru')->get();

            $tanggal = date('Y-m-d');
            $jadwal = Jadwal::where('created_at', 'LIKE', '%' . $tanggal . '%')->latest()->get();
            // return $jadwal;
            $j = [];
            $k = [];
            if ($jadwal->count()) {
                foreach ($jadwal as $jad) {
                    $j[] = $jad->guru_id;
                    $k[] = $jad->kelompok_id;
                }
            }
            $guruPendamping = $guru->whereNotIn('id', $j);
            $jadwalKelompok = $kelompok->whereNotIn('id', $k);

            return view('dashboard.jadwal.create_schedule', [
                'data' => $jadwal,
                'guru' => $guruPendamping,
                'tema' => Tema::all(),
                'kelompok' => $jadwalKelompok,
                'keljadwal' => $kelompok
            ]);
        } else {
            $tahun = Tahun::orderBy('tahun_ajaran')->get();
            $kelompok = Kelompok::orderBy('nama_kelompok')->get();
            if ($tahun->count()) {
                $kelompok = Kelompok::where('tahun_id', $tahun->last()->id)->orderBy('nama_kelompok')->get();
            }
            $guru = Guru::where('devisi', 'Guru')->get();

            $jadwal = Jadwal::latest()->get();
            $j = [];
            $k = [];
            if ($jadwal->count()) {
                foreach ($jadwal as $jad) {
                    $j[] = $jad->guru_id;
                    $k[] = $jad->kelompok_id;
                }
            }
            $guruPendamping = $guru->whereNotIn('id', $j);
            $jadwalKelompok = $kelompok->whereNotIn('id', $k);
            return view('dashboard.jadwal.create_schedule', [
                'data' => $jadwal,
                'guru' => $guruPendamping,
                'tema' => Tema::all(),
                'kelompok' => $jadwalKelompok,
                'keljadwal' => $kelompok
            ]);
        }
    }

    // menampilkan halaman tambah jadwal
    public function createJadwal(Kelompok $kelompok)
    {
        // return date('l');
        // if (date('l') == 'Tuesday') {
        // if (date('l') == 'Wednesday') {
        if (date('l') == 'Thursday') {
            $g = [$kelompok->guru_id];
            $guru = Guru::whereNotIn('id', $g)->where('devisi', 'Guru')->get();

            $tanggal = date('Y-m-d');
            $jadwal = Jadwal::where('created_at', 'LIKE', '%' . $tanggal . '%')->latest()->get();
            // return $jadwal;
            $j = [];
            $k = [];
            if ($jadwal->count()) {
                foreach ($jadwal as $jad) {
                    $j[] = $jad->guru_id;
                    $k[] = $jad->kelompok_id;
                }
            }
            $guruPendamping = $guru->whereNotIn('id', $j);
            // $jadwalKelompok = $kelompok->whereNotIn('id', $k);
            $jadwalKelompok = $jadwal->where('kelompok_id', $kelompok->id);
            return view('dashboard.jadwal.tambah_jadwal', [
                'data' => $jadwal,
                'guru' => $guruPendamping,
                'tema' => Tema::all(),
                'kelompok' => $jadwalKelompok,
                'jadwalkelompok' => $kelompok
            ]);
        } else {
            $g = [$kelompok->guru_id];
            $guru = Guru::whereNotIn('id', $g)->where('devisi', 'Guru')->get();

            $jadwal = Jadwal::latest()->get();
            $j = [];
            $k = [];
            if ($jadwal->count()) {
                foreach ($jadwal as $jad) {
                    $j[] = $jad->guru_id;
                    $k[] = $jad->kelompok_id;
                }
            }
            $guruPendamping = $guru->whereNotIn('id', $j);
            // $jadwalKelompok = $kelompok->whereNotIn('id', $k);
            $jadwalKelompok = $jadwal->where('kelompok_id', $kelompok->id);
            return view('dashboard.jadwal.tambah_jadwal', [
                'data' => $jadwal,
                'guru' => $guruPendamping,
                'tema' => Tema::all(),
                'kelompok' => $jadwalKelompok,
                'jadwalkelompok' => $kelompok
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  proses simpan jadwal yang berhasil di input
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'guru_id' => 'required',
            'kelompok_id' => 'required',
            'sabtu' => 'required|string',
            'sub_sabtu' => 'required|string|min:5',
            'ket_sabtu' => 'nullable|string',
            'minggu' => 'required|string',
            'sub_minggu' => 'required|string|min:5',
            'ket_minggu' => 'nullable|string',
            'senin' => 'required|string',
            'sub_senin' => 'required|string|min:5',
            'ket_senin' => 'nullable|string',
            'selasa' => 'required|string',
            'sub_selasa' => 'required|string|min:5',
            'ket_selasa' => 'nullable|string',
            'rabu' => 'required|string',
            'sub_rabu' => 'required|string|min:5',
            'ket_rabu' => 'nullable|string',
            'kamis' => 'required|string',
            'sub_kamis' => 'required|string|min:5',
            'ket_kamis' => 'nullable|string',
        ]);

        Jadwal::create($validateData);

        return redirect('/administrator/schedule/create')->with('success', 'Added schedule success!');
    }

    // menampilkan halaman lihat jadwal
    public function showJadwal(Kelompok $kelompok)
    {
        $jadwal = Jadwal::where('kelompok_id', $kelompok->id)->latest()->get();
        return view('dashboard.jadwal.schedule', [
            'kelompok' => $kelompok,
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */

    //  menampilkan data siswa yang masuk dalam kelompok
    public function show(Kelompok $kelompok)
    {
        $siswa = Siswa::where('kelompok_id', $kelompok->id)->get();
        $masukSiswa = Siswa::whereNull('kelompok_id')->where('status', 'aktif')->get();
        return view("dashboard.kelompok.kelompok_siswa", [
            'kelompok' => $kelompok,
            'siswa' => $siswa,
            'masuk' => $masukSiswa
        ]);
    }

    // memasukkan siswa yang berhasil terdaftar pada sistem kedalam data kelompok ketika klik simpan 
    public function siswaMasukKelompok(Request $request)
    {
        $data = $request->validate([
            'kelompok_id' => 'required|int',
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'required|int'
        ]);
        $count = Siswa::where('kelompok_id', $request->kelompok_id)->count();
        if ($count >= 30) {
            return back()->with('danger', 'Kelas ini sudah penuh!.');
        }
        $siswa = $data['siswa_id'];
        foreach ($siswa as $sis) {
            Siswa::where('id', $sis)
                ->update(['kelompok_id' => $data['kelompok_id']]);
        }
        return back()->with('success', "Berhasil Masukkan Siswa!.");
    }

    public function hapusSiswa(Request $request, Siswa $siswa)
    {
        Siswa::where('id', $siswa->id)
            ->update(['kelompok_id' => null]);
        return back()->with('success', "Berhasil hapus siswa dari kelompok");
    }

    // menghapus siswa dari halaman kelompok
    public function hapusSiswaKelompok(Request $request, Kelompok $kelompok)
    {
        $siswa = Siswa::where('kelompok_id', $kelompok->id)->get();

        foreach ($siswa as $val) {
            Siswa::where('id', $val->id)
                ->update(['kelompok_id' => null]);
        }
        return back()->with('success', "Berhasil hapus daftar siswa dari kelompok");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */

    //  menampilkan halaman edit jadwal
    public function edit(Jadwal $jadwal)
    {
        $g = [$jadwal->kelompok->guru_id];
        $guru = Guru::whereNotIn('id', $g)->where('devisi', 'Guru')->get();
        $tgl = substr($jadwal->created_at, 0, 10);
        $jadwalGuru = Jadwal::whereNotIn('guru_id', [$jadwal->guru_id])->where('created_at', 'LIKE', '%' . $tgl . '%')->latest()->get();
        $idGuru = [];
        if ($jadwalGuru->count()) {
            foreach ($jadwalGuru as $guruId) {
                $idGuru[] = $guruId->guru_id;
            }
        }
        $guruPendamping = $guru->whereNotIn('id', $idGuru);
        return view('dashboard.jadwal.edit_jadwal', [
            'jadwal' => $jadwal,
            'tema' => Tema::all(),
            'guru' => $guruPendamping
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */

    //  proses mengedit jadwal
    public function update(Request $request, Jadwal $jadwal)
    {
        $validateData = $request->validate([
            'guru_id' => 'required',
            'kelompok_id' => 'required',
            'sabtu' => 'required|string',
            'sub_sabtu' => 'required|string|min:5',
            'ket_sabtu' => 'nullable|string',
            'jumat' => 'required|string',
            'sub_jumat' => 'required|string|min:5',
            'ket_jumat' => 'nullable|string',
            'senin' => 'required|string',
            'sub_senin' => 'required|string|min:5',
            'ket_senin' => 'nullable|string',
            'selasa' => 'required|string',
            'sub_selasa' => 'required|string|min:5',
            'ket_selasa' => 'nullable|string',
            'rabu' => 'required|string',
            'sub_rabu' => 'required|string|min:5',
            'ket_rabu' => 'nullable|string',
            'kamis' => 'required|string',
            'sub_kamis' => 'required|string|min:5',
            'ket_kamis' => 'nullable|string',
        ]);

        Jadwal::where('id', $jadwal->id)
            ->update($validateData);
        return redirect('/administrator/schedule/' . $jadwal->kelompok_id)->with('success', 'Berhasil ubah jadwal kelompok ' . $jadwal->kelompok->nama_kelompok);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */

    //  proses hapus jadwal
    public function destroy(Jadwal $schedule)
    {
        Jadwal::destroy($schedule->id);
        return back()->with('success', 'Schedule has been deleted!');
    }

    public function destroyTema(Tema $tema)
    {
        Tema::destroy($tema->id);
        return back()->with('success', 'Tema has been deleted!');
    }

    // menampilkan halaman tema
    public function tema()
    {
        // $sms = collect([
        //     ['semester' => 'Gasal'],
        //     ['semester' => 'Genap'],
        // ]);
        return view('dashboard.tema.tema', [
            'tema' => Tema::all(),
            'semester' => Semester::latest()->get(),
            'tahun' => Tahun::orderByDesc('tahun_ajaran')->get()
        ]);
    }

    // proses menyimpan tema yang berhasil di input
    public function storeTema(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            // 'tahun_id' => 'required',
            'nama_tema' => 'required',
            'sentra' => 'required',
            'semester' => 'required',
            'pertemuan' => 'required|int'
        ]);

        Tema::create($validateData);
        return back()->with('success', 'Added tema success!.');
    }

    // proses edit tema
    public function updateTema(Request $request)
    {
        $validateData = $request->validate([
            // 'tahun_id' => 'required',
            'nama_tema' => 'required',
            'sentra' => 'required',
            'semester' => 'required',
            'pertemuan' => 'required|int'
        ]);

        Tema::where('id', $request->id)
            ->update($validateData);
        return back()->with('success', 'Tema has been updated!');
    }

    // proses mengedit kelompok
    public function updateKelompok(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'nama_kelompok' => 'required',
        ]);

        Kelompok::where('id', $validateData['id'])
            ->update([
                'nama_kelompok' => $validateData['nama_kelompok']
            ]);
        return back()->with('success', 'Tema has been updated!');
    }

    // membuka tombol edit tema yang dipilih pada halaman tema
    public function cekTema(Request $request)
    {
        $data = Tema::find($request->id);
        return response()->json($data);
    }

    // proses menyimpan ketika tambah kelompok
    public function storeKelompok(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'nama_kelompok' => 'required',
            'tahun_id' => 'required',
            'guru_id' => 'required'
        ]);

        Kelompok::create($validateData);
        return back()->with('success', 'success add kelompok');
    }

    // membuka halaman kelompok
    public function kelompok()
    {
        $kel = Kelompok::orderBy('nama_kelompok')->get();
        $g = [];
        if ($kel->count()) {
            foreach ($kel as $k) {
                if ($k->guru_id != null) {
                    $g[] = $k->guru_id;
                }
            }
        }
        return view('dashboard.kelompok.kelompok', [
            'kelompok' => $kel,
            'tahun' => Tahun::orderBy('tahun_ajaran')->get(),
            'guru' => Guru::whereNotIn('id', $g)->where('devisi', 'Guru')->get()
        ]);
    }

    public function cekKelompok(Request $request)
    {
        $data = Kelompok::find($request->id);
        return response()->json($data);
    }

    public function destroyKelompok(Kelompok $kelompok)
    {
        $jadwal = Jadwal::where('kelompok_id', $kelompok->id)->get();
        foreach ($jadwal as $j) {
            Jadwal::destroy($j->id);
        }
        $siswa = Siswa::where('kelompok_id', $kelompok->id)->get();
        foreach ($siswa as $s) {
            Siswa::where('id', $s->id)
                ->update(['kelompok_id' => null]);
        }
        Kelompok::destroy($kelompok->id);
        return back()->with('success', 'Kelompok berhasil dihapus!');
    }

    public function tahunAjaran()
    {
        return view('dashboard.admin.tahun', [
            'tahun' => Tahun::orderBy('tahun_ajaran')->get()
        ]);
    }

    public function storeTahun(Request $request)
    {
        $request['tahun_ajaran'] = $request->tahun_satu . '/' . $request->tahun_dua;

        $validateData = $request->validate([
            'tahun_satu' => 'required|digits:4|integer|min:2010|max:' . (date('Y')),
            'tahun_dua' => 'required|digits:4|integer|min:' . ($request->tahun_satu + 1) . '|max:' . ($request->tahun_satu + 1),
            'tahun_ajaran' => 'unique:tahun'
        ]);
        // $validateData = $request->validate([
        //     'tahun_satu' => 'required|size:4',
        //     'tahun_dua' => 'required|size:4',
        //     'tahun_ajaran' => 'unique:tahun'
        // ]);
        // return $validateData;
        Tahun::create(['tahun_ajaran' => $validateData['tahun_ajaran']]);
        return back()->with('success', 'Added Tahun Ajaran Success!');
    }

    public function sendNotifikasi(Kelompok $kelompok)
    {
        $jadwal = Jadwal::where('kelompok_id', $kelompok->id)->get();
        // return $jadwal;
        $id = $kelompok->id;
        $siswa = Siswa::where('kelompok_id', $id)->get();
        foreach ($siswa as $item) {
            echo "<pre>";
            echo $item->no_telp;
            echo "</pre>";


            $notelf = $item->no_telp;
            $pesan = [];
            $data['phone'] = $notelf;
            $data['message'] = 'Selamat siang, Jadwal pembelajaran telah dibagikan. Silahkan buka sistem konseling pada link dibawah, kemudian masukkan username dan password yang anda miliki untuk melihat jadwal kegiatan anak dalam satu minggu http://127.0.0.1:8000/';
            $data['secret'] = false;
            $data['retry'] = false;
            $data['isGroup'] = false;
            array_push($pesan, $data);
            NotifikasiWhatsappTrait::sendText($pesan);
        }
        echo '<a href="/dashboard">Kembali</a>';
        die;
    }

    public function semester()
    {
        return view('dashboard.semester.index', [
            'tahun' => Tahun::orderBy('tahun_ajaran')->get(),
            'semester' => Semester::latest()->get()
        ]);
    }

    public function storeSemester(Request $request)
    {
        $request['semester'] = $request->sms . ' ' . $request->tahun;

        $validateData = $request->validate([
            'sms' => 'required',
            'tahun' => 'required',
            'semester' => 'unique:semesters,semester'
        ]);

        Semester::create(['semester' => $validateData['semester']]);
        return back()->with('success', 'berhasil menambahkan semester!.');
    }

    public function destroySemester(Semester $semester)
    {
        Semester::destroy($semester->id);
        return back()->with('success', 'Semester berhasil dihapus!');
    }
}
