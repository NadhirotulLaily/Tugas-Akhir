<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $tugas = DB::table('tugas')
        ->when($request->input('search'),function ($query, $search){
            $query->where('nama','like','%'.$search.'%')
            ->orWhere('semester','like','%'.$search.'%');
        })
        ->paginate(10);
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
        $validatedData = $request->validate([
            'tugas' => 'required|max:45',
            'waktu' => 'required|integer',
            'status' => 'required|in:available,unavailable',
        ]);

        $tugas = new Tugas();
        $tugas->tugas = $validatedData['tugas'];
        $tugas->waktu = $validatedData['waktu'];
        $tugas->status = $validatedData['status'];
        $tugas->save();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat.');
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
            'tugas' => 'required|max:45',
            'waktu' => 'required|integer',
            'status' => 'required|in:available,unavailable',
        ]);

        
            
        try {
            $tugas = Tugas::findOrFail($id);
            
            $tugas->update([
                'tugas' => $request->tugas,
                'waktu' => $request->waktu,
                'status' => $request->status,
            ]);
    
            return redirect()->route('tugas.index')->with('success', 'Data tugas berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
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
        DB::table('tugas')->where('id',$id)->delete();
        return redirect()->route('tugas.index');
    }
}
