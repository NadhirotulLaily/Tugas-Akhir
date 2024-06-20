<?php

namespace App\Http\Controllers;

use App\Models\PilihTugas;
use App\Models\cektugas;
use App\Models\tugas;
use App\Models\rekap;
use App\Http\Requests\StorePilihTugasRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success('Berhasil', 'File Berhasil Upload');
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
    public function update(Request $request, $id)
{
    // Temukan data PilihTugas berdasarkan ID
    $pilihTugas = PilihTugas::findOrFail($id);
    $email = $pilihTugas->email;

    // Temukan rekaman rekap yang sesuai berdasarkan email
    $rekap = Rekap::where('email', $email)->firstOrFail();

    // Ambil nilai waktu dari tugas yang terkait
    $waktu = $pilihTugas->tugas->waktu;

    // Kurangi nilai kompen di rekapan
    $rekap->kompen -= $waktu;

    // Simpan rekapan yang sudah diperbarui
    $rekap->save();

    $pilihTugas->delete();

    Alert::success('Berhasil', 'Verifikasi Berhasil');
    // Redirect kembali atau ke rute lain sesuai kebutuhan
    return redirect()->route('cektugas.lihatBukti')->with('success', 'Kompen berhasil diperbarui.');
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

    public function lihatBukti($id)
    {
        $tugasItem = PilihTugas::findOrFail($id);
        return view('cektugas.lihatBukti', compact('tugasItem'));
    }

}
