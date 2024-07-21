<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
        $tugas = Tugas::paginate(10); 
        
        
        return view ('tugas.index', compact ('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tugas.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
         // Validasi data
        $validatedData = $request->validate([
            'tugas' => 'required|string|max:255',
            'waktu' => 'required|integer|between:1,8',
        ]);

        // Simpan data ke database
        $tugas = new Tugas();
        $tugas->tugas = $validatedData['tugas'];
        $tugas->waktu = $validatedData['waktu'];
        $tugas->save();

        // Redirect ke halaman index
        Alert::success('Berhasil', 'Tugas berhasil di tambah');
        return redirect()->route('tugas.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('tugas.edit', compact('tugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $validatedData = $request->validate([
            'tugas' => 'required|string|max:255',
            'waktu' => 'required|integer|between:1,6',
        ]);
    
    
        try {
            $tugas = Tugas::findOrFail($id);
    
            $updated = $tugas->update($validatedData);
    
            if ($updated) {
                Alert::success('Berhasil', 'Tugas berhasil diperbarui');
                return redirect()->route('tugas.index');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui tugas.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('tugas')->where('id', $id)->delete();
            Alert::success('Berhasil', 'Tugas berhasil dihapus');
            return redirect()->route('tugas.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal menghapus tugas');
            return redirect()->route('tugas.index');
        }
    }

    public function uploadBukti(Request $request)
    {
        
    }

    public function processPilihTugas(Request $request)
    {
        // Validasi permintaan formulir jika diperlukan

        // Dapatkan data tugas yang dipilih dari permintaan formulir
        $selectedTasksIds = $request->input('selected_tasks');

        // Dapatkan detail tugas yang dipilih dari database
        $selectedTasks = Tugas::whereIn('id', $selectedTasksIds)->get();

        // Kirim data tugas yang dipilih ke tampilan
        return view('pilihtugas.upload', ['selectedTasks' => $selectedTasks]);
    }

}
