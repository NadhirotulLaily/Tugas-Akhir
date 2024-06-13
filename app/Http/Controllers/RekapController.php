<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Mengambil data rekap yang terkait dengan user yang sedang login
        if ($user->role == 'superadmin') {
            // Jika admin, ambil semua data rekap
            $rekap = Rekap::all();
        } else {
            // Jika bukan admin, ambil data rekap berdasarkan email pengguna
            $rekap = $user->rekaps()->get();
        }

        //$rekap = DB::table('rekap')
        // ->when($request->input('search'),function ($query, $search){
        //     $query->where('nama','like','%'.$search.'%')
        //     ->orWhere('semester','like','%'.$search.'%');
        // })
        // ->paginate(10);
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
    
            $rekap = new Rekap();
            $rekap->nama = $request->input('nama');
            $rekap->nim = $request->input('nim');
            $rekap->semester = $request->input('semester');
            $rekap->kompen = $request->input('kompen');
            $rekap->email = $request->input('email');
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
    public function edit($id)
    {
        $rekap = Rekap::findOrFail($id);
        return view('rekap.edit', compact('rekap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'nama' => 'required|max:45',
            'nim' => 'required|max:45',
            'semester' => 'required|max:45',
            'kompen' => 'required|integer',
        ]);

        
            
        try {
            $rekap = Rekap::findOrFail($id);
            
            $rekap->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'semester' => $request->semester,
                'kompen' => $request->kompen,
            ]);
    
            return redirect()->route('rekap.index')->with('success', 'Data rekap berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
