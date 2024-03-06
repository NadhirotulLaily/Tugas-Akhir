<?php

namespace App\Http\Controllers;

use App\Models\cektugas;
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
        return view('cektugas.index');
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
    public function show(cektugas $cektugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cektugas  $cektugas
     * @return \Illuminate\Http\Response
     */
    public function edit(cektugas $cektugas)
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
    public function update(Request $request, cektugas $cektugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cektugas  $cektugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(cektugas $cektugas)
    {
        //
    }
}
