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
    $uploadedFiles = [];

    foreach ($bukti_tugas_files as $index => $file) {
        // Buat nama file unik dengan menambahkan timestamp
        $filename = time() . '_' . $file->getClientOriginalName();
        // Simpan file ke folder 'public/bukti_tugas'
        $path = $file->storeAs('public/bukti_tugas', $filename);

        // Temukan tugas yang dipilih berdasarkan ID
        $selectedTask = PilihTugas::find($request->input('task_ids')[$index]);
        // Simpan nama file ke dalam database
        $selectedTask->bukti_tugas = $filename;
        $selectedTask->status_verifikasi = 'Belum diverifikasi'; // Set default status
        $selectedTask->save();

        // Tambahkan nama file ke array $uploadedFiles
        $uploadedFiles[$selectedTask->id] = $filename;
    }

    // Tampilkan alert sukses
    Alert::success('Berhasil', 'File Berhasil Upload');
    // Redirect kembali ke halaman upload dengan nama file yang diunggah
    return redirect()->route('pilihtugas.upload')->with('uploadedFiles', $uploadedFiles)->with('allFilesUploaded', true);
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
        $pilihTugas = PilihTugas::findOrFail($id);
        $email = $pilihTugas->email;

        if ($request->has('verifikasi')) {
            $rekap = Rekap::where('email', $email)->firstOrFail();
            $waktu = $pilihTugas->tugas->waktu;

            // Cek apakah kompen lebih besar dari 0 sebelum mengurangi
            if ($rekap->kompen > 0) {
                $rekap->kompen -= $waktu;

                // Pastikan kompen tidak kurang dari 0
                if ($rekap->kompen < 0) {
                    $rekap->kompen = 0;
                }

                $rekap->save();
                $pilihTugas->status_verifikasi = 'Terverifikasi';
            } else {
                return redirect()->route('cektugas.index')->with('error', 'Kompen sudah tuntas, tidak dapat diverifikasi.');
            }
        } else {
            $pilihTugas->status_verifikasi = 'Tidak Terverifikasi';
        }

        // Update nama file bukti tugas jika ada
        if ($pilihTugas->bukti_tugas) {
            $filename = $pilihTugas->bukti_tugas;
            $pilihTugas->bukti_tugas = $filename;
        }

        $pilihTugas->save();

        Alert::success('Berhasil', 'Berhasil melakukan verifikasi.');

        return redirect()->route('cektugas.index')->with('success', 'Berhasil melakukan verifikasi.');
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