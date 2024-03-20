<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rekap = DB::table('rekap')
        ->when($request->input('search'),function ($query, $search){
            $query->where('nama','like','%'.$search.'%')
            ->orWhere('semester','like','%'.$search.'%');
        })
        ->paginate(10);
        return view ('rekap.index', compact ('rekap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekap.input');
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
            'nama' => 'required|max:45',
            'nim' => 'required|max:45',
            'semester' => 'required|max:45',
            'kompen' => 'required|integer',
        ]);
    
        
            // Gunakan model Eloquent untuk menyimpan data ke database
            $rekap = new Rekap();
            $rekap->nama = $request->input('nama');
            $rekap->nim = $request->input('nim');
            $rekap->semester = $request->input('semester');
            $rekap->kompen = $request->input('kompen');
            $rekap->save();
    
            return redirect()->route('rekap.index')->with('success', 'Data rekap berhasil ditambahkan.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         DB::table('rekap')->where('id',$id)->delete();
         return redirect()->route('rekap.index');
        } 
    
}
