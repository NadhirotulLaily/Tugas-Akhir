<?php

namespace App\Http\Controllers;

use App\Models\pilihtugas;
use App\Models\tugas;
use Illuminate\Http\Request;

class PilihtugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua tugas dari database
        $tugas = Tugas::all();
        
        // Kembalikan tampilan index dengan tugas-tugas yang tersedia
        return view('pilihtugas.index', compact('tugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi permintaan jika diperlukan

        // Ambil ID tugas yang dipilih dari permintaan
        $selectedTaskIds = $request->input('selected_tasks');

        // Loop melalui setiap ID tugas yang dipilih
        foreach ($selectedTaskIds as $selectedTaskId) {
            // Cari tugas berdasarkan ID
            $selectedTask = Tugas::findOrFail($selectedTaskId);

            // Perbarui status tugas menjadi "unavailable"
            $selectedTask->update([
                'status' => 'unavailable',
            ]);

            // Simpan informasi tentang tugas yang dipilih ke dalam database
            PilihTugas::create([
                'tugas_id' => $selectedTaskId,
                // Jika ada informasi tambahan yang ingin Anda simpan, tambahkan di sini
            ]);
        }

        // Redirect ke halaman create tugas dengan pesan sukses jika diperlukan
        return redirect()->route('tugas.create')->with('success', 'Tugas berhasil dipilih.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil daftar tugas yang tersedia
        $availableTasks = Tugas::whereNotIn('id', pilihtugas::pluck('tugas_id'))->get();
        
        // Kembalikan tampilan create dengan daftar tugas yang tersedia
        return view('pilihtugas.create', compact('availableTasks'));
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
