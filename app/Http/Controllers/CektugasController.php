<?php

namespace App\Http\Controllers;

use App\Models\PilihTugas;
use App\Models\cektugas;
use App\Models\tugas;
use App\Http\Requests\StorePilihTugasRequest;
use Illuminate\Http\Request;

class CektugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tugas = PilihTugas::all();
        
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
     * @param  \Illuminate\Http\StorePilihTugas  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePilihTugasRequest $request)
    {
        $bukti_tugas_files = $request->file('bukti_tugas');

        foreach ($bukti_tugas_files as $index => $file) {
            $path = $file->store('public/bukti_tugas');
            $selectedTask = PilihTugas::find($request->input('task_ids')[$index]);
            $selectedTask->bukti_tugas = $path;
            $selectedTask->save();
        }

        return redirect()->route('pilihtugas.upload')->with('success', 'File uploaded successfully.');
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
