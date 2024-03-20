<?php

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
    

    Route::get('/tambah-tugas', function () {
        return view('tugas.tambah');
    })->name('tambah.tugas');    

    Route::get('/input-rekap', function () {
        return view('rekap.input');
    })->name('input.rekap'); 
    
    // Route untuk menampilkan form input rekap (create)
Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');
Route::get('/input-rekap', [RekapController::class, 'create'])->name('input.rekap');
Route::get('/input-rekap/delete/{id}', [RekapController::class, 'destroy'])->name('rekap.delete');


// Route untuk menangani penyimpanan data rekap (store)
Route::post('/input-rekap/store', [RekapController::class, 'store'])->name('rekap.store');
});


Route::resource('user', UserController::class);

Route::resource('tugas', TugasController::class);
Route::resource('cektugas', CektugasController::class);


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

