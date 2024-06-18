<?php

use App\Http\Controllers\PilihtugasController;
use App\Http\Controllers\CektugasController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
   return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware('can:dashboard');

    Route::get('edit-profile', function () {
        return view('dashboard.profile');
    })->name('profile.edit');
    

       
    // Rekap
    Route::get('/input-rekap', function () {
        return view('rekap.input');
    })->name('input.rekap'); 
    Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');
    Route::get('/input-rekap', [RekapController::class, 'create'])->name('input.rekap');
    Route::get('/input-rekap/delete/{id}', [RekapController::class, 'destroy'])->name('rekap.delete');
    Route::post('/input-rekap/store', [RekapController::class, 'store'])->name('rekap.store');
    Route::get('/rekap/{id}/edit', [RekapController::class, 'edit'])->name('rekap.edit');
    Route::put('/rekap/{id}/update', [RekapController::class, 'update'])->name('rekap.update');


    // Tugas
    
    
    Route::get('/input-tugas', function () {
        return view('tugas.input');
    })->name('input.tugas'); 
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/input-tugas', [TugasController::class, 'create'])->name('input.tugas');
    Route::post('/input-tugas/store', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/tugas/{id}/update', [TugasController::class, 'update'])->name('tugas.update');
    Route::get('/input-tugas/delete/{id}', [TugasController::class, 'destroy'])->name('tugas.delete');
    Route::post('/upload-bukti/{id}', [TugasController::class, 'uploadBukti'])->name('upload.bukti');
    Route::post('/proses-pilih-tugas', [TugasController::class, 'processPilihTugas'])->name('pilih.tugas');


    Route::resource('tugas', TugasController::class);
    

    // Cek Tugas
    Route::resource('cektugas', CektugasController::class);
    Route::get('/cektugas', [CektugasController::class, 'index'])->name('cektugas.index');
    Route::post('/cektugas/store', [CektugasController::class, 'store'])->name('cektugas.store');


    
    

    //Pilih Tugas
    Route::resource('pilih-tugas', PilihtugasController::class);
    
    Route::get('/pilih-tugas', [PilihtugasController::class, 'index'])->name('pilihtugas.index');
    Route::get('/upload-tugas', [PilihtugasController::class, 'showUploadForm'])->name('pilihtugas.upload');
    Route::post('/upload-tugas', [PilihtugasController::class, 'upload'])->name('pilihtugas.upload.submit');
    Route::post('/pilihtugas/process', [PilihtugasController::class, 'process'])->name('pilihtugas.process');
    
    // cetak bebas kompen

    Route::get('/rekap/{id}/download-pdf', [RekapController::class, 'downloadPdf'])->name('rekap.downloadPdf');



});


Route::resource('user', UserController::class);



//Route::get('/baru', function () {
 //   return view('dashboard.baru');
//});

//Route::get('/login', function () {
//    return view('auth.login');
//})->name('login');

//Route::get('/register', function () {
//    return view('auth.register');
//})->name('register');

//Route::get('/forgot', function () {
//    return view('auth.forgot');
//})->name('forgot');

//Route::get('/reset', function () {
//    return view('auth.reset');
//})->name('reset');

