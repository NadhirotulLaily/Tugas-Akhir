<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rekap;
use App\Models\PilihTugas;
use App\Models\User;
use App\Models\tugas;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard berdasarkan role pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Menginisialisasi variabel untuk data yang akan ditampilkan di dashboard
        $totalKompen = 0;
        $totalTugas = 0;
        $availableTugas = 0;
        $unavailableTugas = 0;

        // Logika untuk menentukan data yang ditampilkan berdasarkan role user
        if ($user->role == 'superadmin') {
            // Jika user adalah superadmin, hitung total rekap dan tugas dari semua pengguna
            $totalKompen = Rekap::sum('kompen');
            $totalTugas = PilihTugas::count();
            $availableTugas = Tugas::where('status', 'available')->count();
            $unavailableTugas = Tugas::where('status', 'unavailable')->count();
        } else {
            // Jika bukan superadmin, hitung total rekap dan tugas hanya untuk pengguna yang sedang login
            $totalKompen = Rekap::where('email', $user->email)->sum('kompen');
            $totalTugas = PilihTugas::where('email', $user->email)->count();
            $availableTugas = Tugas::where('status', 'available')->count();
            $unavailableTugas = Tugas::where('status', 'unavailable')->count();
        }

        // Tampilkan dashboard dengan data yang sudah dihitung
        return view('dashboard.index', compact('totalKompen', 'totalTugas', 'availableTugas', 'unavailableTugas'));
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
            //
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
}
