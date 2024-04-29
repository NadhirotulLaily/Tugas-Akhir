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
        //
        $tugas = Tugas::all();
    return view('pilihtugas.index', compact('tugas'));
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
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function show( $pilihtugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function edit( $pilihtugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cektugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $pilihtugas)
    {
        //
    }

    /**
     * Proses pemilihan tugas oleh pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processSelectedTasks(Request $request)
    {
        // Validasi permintaan jika diperlukan
        
        // Ambil ID dari tugas yang dipilih dari permintaan
        $selectedTaskIds = $request->input('selected_tasks');

        // Ambil hanya tugas-tugas yang dipilih dari database
        $selectedTasks = Tugas::whereIn('id', $selectedTaskIds)->get();

        // Kembalikan tampilan dengan tugas-tugas yang dipilih
        return view('pilihtugas.upload', compact('selectedTasks'));
    }
    
}
