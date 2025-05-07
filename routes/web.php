<?php

use App\Http\Controllers\{
    AuthController,
    StartController,
    DashboardController,
    PendudukController,
    PendidikanController,
    PekerjaanController,
    AgamaController,
    JenisKelaminController,
    UmurController,
    LuasWilayahController,
    DisabilitasController,
    UserController,
    MasterPekerjaanController,
    MasterDisabilitasController,
    MasterKISController,
    MasterBantuanController
};

use App\Http\Controllers\showcase\{LapakController, BeritaController};
use App\Http\Controllers\Admin\{AdmVisiMisiController, AdmBeritaController, AdmSejarahController, AdmLapakController};
use App\Http\Controllers\showcase\demografi\{SCPendidikanController, SCPekerjaanController, SCAgamaController, SCJenisKelaminController, SCUmurController, SCLuasWilayahController, SCDisabilitasController};
use App\Http\Controllers\showcase\profile\{SejarahController, VisiMisiController, AparatController};
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);

Route::get('/', [StartController::class, 'index']);

Route::get('/showcase/lapak', [LapakController::class, 'index']);
Route::get('/showcase/berita', [BeritaController::class, 'index']);

Route::prefix('showcase/demografi')->group(function () {
    Route::get('/pendidikan', [SCPendidikanController::class, 'index']);
    Route::get('/pekerjaan', [SCPekerjaanController::class, 'index'])->name('/showcase/demografi/pekerjaan');
    Route::get('/agama', [SCAgamaController::class, 'index']);
    Route::get('/jeniskelamin', [SCJenisKelaminController::class, 'index']);
    Route::get('/umur', [SCUmurController::class, 'index']);
    Route::get('/luaswilayah', [SCLuasWilayahController::class, 'index']);
    Route::get('/disabilitas', [SCDisabilitasController::class, 'index']);
});

Route::prefix('showcase/profile')->group(function () {
    Route::get('/visi-misi', [VisiMisiController::class, 'index']);
    Route::get('/sejarah', [SejarahController::class, 'index']);
    Route::get('/aparat', [AparatController::class, 'index']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'cek.level:Admin,Pamekaran,Limusagung,Nanggeleng,Darawati,Mangunjaya,Cimaja,Cimanglid'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/penduduk', PendudukController::class);
    Route::get('/pendidikan', [PendidikanController::class, 'index']);
    Route::get('/pekerjaan', [PekerjaanController::class, 'index']);
    Route::get('/agama', [AgamaController::class, 'index']);
    Route::get('/jeniskelamin', [JenisKelaminController::class, 'index']);
    Route::get('/umur', [UmurController::class, 'index']);
    Route::get('/luaswilayah', [LuasWilayahController::class, 'index']);
    Route::get('/disabilitas', [DisabilitasController::class, 'index']);
    Route::resource('/mdisabilitas', MasterDisabilitasController::class);
});

Route::resource('/users', UserController::class);
Route::middleware(['auth', 'cek.level:Admin'])->group(function () {
    Route::resource('/master/pekerjaan', MasterPekerjaanController::class);
    Route::resource('/master/kis', MasterKISController::class);
    Route::resource('/master/bantuan', MasterBantuanController::class);

    Route::resource('/admin/visi-misi', AdmVisiMisiController::class);
    Route::resource('/admin/sejarah', AdmSejarahController::class);
    Route::resource('/admin/lapakdesa', AdmLapakController::class);
    Route::resource('/admin/berita', AdmBeritaController::class);
});

Route::get('/showcase/idm/{item}',[App\Http\Controllers\showcase\IdmController::class, 'index']);
Route::get('/showcase/laporan_apdes',[App\Http\Controllers\showcase\LaporanApdesController::class, 'index']);
