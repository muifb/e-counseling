<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about', [
        'title'     =>  'About me',
        'name'      =>  'Abdul Muif Bahtiar',
        'email'     =>  'abdulmuif.bahtiar@gmail.com',
        'alamat'    =>  'Gandrirojo RT.04 RW.01 Sedan Rembang Jawa Tengah 59264'
    ]);
});

// Dapat diakses sebelum login
Route::middleware((['guest']))->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [LoginController::class, 'register']);
    // Route::post('/register', [LoginController::class, 'store']);
});

// Dapat diakses setelah login
Route::middleware(['auth'])->group(function () {
    // Yang dapat diakses wali murid
    Route::middleware(['aksesWali'])->group(function () {
        Route::get('/learning', [WaliController::class, 'show']);
        Route::get('/hasil-belajar', [WaliController::class, 'showReport']);
        Route::get('/jadwal', [WaliController::class, 'showJadwal']);
        Route::get('/daftar-siswa', [WaliController::class, 'index']);
        Route::get('/wali-profile', [WaliController::class, 'profile']);
        Route::put('/wali-profile/{user}', [WaliController::class, 'updatePassword']);
        Route::put('/wali-profile/upload/{upload}', [WaliController::class, 'uploadImage']);
    });
    // Yang dapat diakses tatausaha
    Route::middleware(['aksesAdmin'])->group(function () {
        Route::middleware(['aksesTu'])->group(function () {
            Route::resource('/administrator/students', SiswaController::class);
            Route::put('/administrator/users/reset-password/{user}', [UserController::class, 'resetPassword']);
            Route::get('/administrator/schedule/create', [AdminController::class, 'create']);
            Route::get('/administrator/schedule/create-jadwal/{kelompok}', [AdminController::class, 'createJadwal']);
            Route::post('/administrator/schedule', [AdminController::class, 'store']);
            Route::put('/administrator/schedule/{jadwal}', [AdminController::class, 'update']);
            Route::get('/administrator/schedule/edit/{jadwal}', [AdminController::class, 'edit']);
            Route::get('/administrator/schedule/{kelompok}', [AdminController::class, 'showJadwal']);
            Route::delete('/administrator/schedule/{schedule}', [AdminController::class, 'destroy']);
            Route::get('/administrator/tema', [AdminController::class, 'tema']);
            Route::post('/administrator/tema', [AdminController::class, 'storeTema']);
            Route::get('/administrator/kelompok', [AdminController::class, 'kelompok']);
            Route::get('/administrator/semester', [AdminController::class, 'semester']);
            Route::post('/administrator/semester', [AdminController::class, 'storeSemester']);
            Route::delete('/administrator/semester/{semester}', [AdminController::class, 'destroySemester']);
            Route::post('/administrator/kelompok/siswa', [AdminController::class, 'siswaMasukKelompok']);
            Route::put('/administrator/kelompok/siswa/hapus/{siswa}', [AdminController::class, 'hapusSiswa']);
            Route::put('/administrator/kelompok/siswas/hapus/{kelompok}', [AdminController::class, 'hapusSiswaKelompok']);
            Route::post('/administrator/kelompok', [AdminController::class, 'storeKelompok']);
            Route::delete('/administrator/kelompok/{kelompok}', [AdminController::class, 'destroyKelompok']);
            Route::get('/administrator/tahun-ajaran', [AdminController::class, 'tahunAjaran']);
            Route::post('/administrator/tahun-ajaran', [AdminController::class, 'storeTahun']);
            Route::post('/administrator/tema/edit', [AdminController::class, 'updateTema']);
            Route::post('/administrator/kelompok/edit', [AdminController::class, 'updateKelompok']);
            Route::delete('/administrator/tema/{tema}', [AdminController::class, 'destroyTema']);
            Route::get('/administrator/cekTema', [AdminController::class, 'cekTema']);
            Route::get('/administrator/cekKelompok', [AdminController::class, 'cekKelompok']);
        });
        Route::resource('/administrator/teachers', GuruController::class);
    });
    // Yang dapat diakses kepala sekolah dan guru
    Route::middleware(['aksesGuru'])->group(function () {
        Route::get('/dashboard/evaluasi-pembelajaran', [LearningController::class, 'evaluasi']);
        Route::get('/dashboard/evaluasi-pembelajaran/kelompok/{tahun}', [LearningController::class, 'kelompok']);
        Route::get('/dashboard/evaluasi-pembelajaran/kelompok/siswas/{kelompok}', [LearningController::class, 'siswas']);
        Route::get('/dashboard/learnings/add-detail/{siswa}', [LearningController::class, 'show']);
        Route::get('/dashboard/learnings/see-report/{siswa}', [LearningController::class, 'showReport']);
        Route::post('/dashboard/learnings/accept', [ReportController::class, 'accept']);
        Route::post('/dashboard/learnings/accept-all', [ReportController::class, 'acceptAll']);
        Route::post('/dashboard/learnings/reject', [ReportController::class, 'reject']);
        Route::post('/dashboard/learnings/report', [ReportController::class, 'store']);
        Route::put('/dashboard/learnings/report/{report}', [ReportController::class, 'update']);
        Route::get('/dashboard/learnings/report/{siswa}', [ReportController::class, 'show']);
        Route::get('/dashboard/learnings/report/edit/{report}', [ReportController::class, 'edit']);
        Route::get('/dashboard/request-reports', [ReportController::class, 'index']);
        Route::get('/dashboard/request-reports/detail-report/{report}', [ReportController::class, 'showReport']);
        Route::get('/dashboard/request-reports/detail-reports/{kelompok}', [ReportController::class, 'showReports']);
        Route::resource('/dashboard/learnings', DashboardStudentController::class);
    });
    // Yang dapat diakses selain wali murid
    Route::middleware(['userAkses'])->group(function () {
        Route::get('/administrator/kelompok/siswa/{kelompok}', [AdminController::class, 'show']);
        Route::get('/dashboard/schedule/send/{kelompok}', [AdminController::class, 'sendNotifikasi']);
        Route::get('/dashboard', [PageController::class, 'dashboard']);
        Route::get('/dashboard/galeri', [PageController::class, 'galeri']);
        Route::get('/dashboard/profile', [PageController::class, 'profile']);
        // Route::put('/dashboard/profile/{profile}', [PageController::class, 'update']);
    });
    Route::post('/learning/print', [LearningController::class, 'print']);
    Route::post('/logout', [LoginController::class, 'logout']);
});
