<?php

use App\Http\Controllers\PilihtugasController;
use App\Http\Controllers\CektugasController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekapController;
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
    Route::get('home', function () {
        return view('dashboard.home');
    })->name('home')->middleware('can:dashboard');

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

    Route::resource('tugas', TugasController::class);

    // Cek Tugas
    Route::get('/cektugas', [CektugasController::class, 'index'])->name('cektugas.index');

    
    

    //Pilih Tugas
    Route::get('/pilih-tugas', [PilihTugasController::class, 'index'])->name('pilihtugas.index');
    Route::get('/upload-tugas', [PilihTugasController::class, 'showUploadForm'])->name('pilihtugas.upload');
    Route::post('/upload-tugas', [PilihTugasController::class, 'upload'])->name('pilihtugas.upload.submit');
    Route::post('/pilih-tugas', [PilihTugasController::class, 'processSelectedTasks'])->name('pilih.tugas.process');


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

