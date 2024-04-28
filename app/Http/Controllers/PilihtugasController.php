<?php

namespace App\Http\Controllers;

use App\Models\PilihTugas;
use Illuminate\Http\Request;

class PilihTugasController extends Controller
{
    /**
     * Proses pemilihan tugas oleh pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processSelectedTasks(Request $request)
    {
        // Validasi data yang dikirim dari form, pastikan request memiliki selected_tasks
        $request->validate([
            'selected_tasks' => 'required|array',
            'selected_tasks.*' => 'exists:tugas,id',
        ]);

        // Mendapatkan array dari tugas yang dipilih oleh pengguna
        $selectedTasks = $request->input('selected_tasks');

        // Panggil fungsi pilihTugas dari model Tugas untuk memproses pemilihan tugas
        PilihTugas::pilihTugas($selectedTasks);

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Tugas berhasil dipilih.');
    }
}
