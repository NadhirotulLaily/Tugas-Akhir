<?php

namespace App\Http\Controllers;

use App\Models\PilihTugas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // // Ambil daftar tugas yang tersedia
        // $availableTasks = Tugas::whereNotIn('id', pilihtugas::pluck('tugas_id'))->get();
        
        // // Kembalikan tampilan create dengan daftar tugas yang tersedia
        // return view('pilihtugas.create', compact('availableTasks'));
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

    public function showUploadForm()
    {
        // Ambil semua tugas yang sudah dipilih untuk pengguna yang sedang login
        $selectedTasks = PilihTugas::with('tugas')->where('email', Auth::user()->email)->get();
        return view('pilihtugas.upload', compact('selectedTasks'));
    }

    public function process(Request $request)
    {
        $selectedTasks = $request->input('selected_tasks', []);

        if (empty($selectedTasks)) {
            return redirect()->back()->with('error', 'Tidak ada tugas yang dipilih.');
        }

        // Dapatkan email pengguna yang sedang login
        $email = Auth::user()->email;

        foreach ($selectedTasks as $taskId) {
            // Periksa apakah tugas sudah dipilih oleh pengguna
            $existingSelection = PilihTugas::where('email', $email)
                                            ->where('tugas_id', $taskId)
                                            ->first();

            if (!$existingSelection) {
                // Buat entri baru PilihTugas
                PilihTugas::create([
                    'email' => $email,
                    'tugas_id' => $taskId,
                ]);

                // Update status tugas menjadi 'unavailable'
                $task = Tugas::find($taskId);
                if ($task) {
                    $task->status = 'unavailable';
                    $task->save();
                }
            }
        }

        return redirect()->route('pilihtugas.upload')->with('success', 'Tugas berhasil dipilih.');
    }
}