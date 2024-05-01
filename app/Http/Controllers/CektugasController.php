<?php

namespace App\Http\Controllers;

use App\Models\cektugas;
use App\Models\tugas;
use Illuminate\Http\Request;

class CektugasController extends Controller
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
        
        // Kirim data tugas ke view cektugas.index
        return view('cektugas.index', compact('tugas'));
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
     * @param  \App\Models\cektugas  $cektugas
     * @return \Illuminate\Http\Response
     */
    public function show( $cektugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cektugas  $cektugas
     * @return \Illuminate\Http\Response
     */
    public function edit( $cektugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cektugas  $cektugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cektugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cektugas  $cektugas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $cektugas)
    {
        //
    }
}
