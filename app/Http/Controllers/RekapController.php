<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Mengambil data rekap yang terkait dengan user yang sedang login
        if ($user->role == 'superadmin') {
            $rekap = Rekap::paginate(10); 
        } else {
            $rekap = $user->rekaps()->paginate(10); 
        }

        return view('rekap.index', compact('rekap'));
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

            Alert::success('Berhasil', 'Data rekap berhasil ditambahkan ');
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

            Alert::success('Berhasil', 'Data telah berhasil diperbarui');
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
        
        try {
            Rekap::destroy($id);
            Alert::success('Berhasil', 'Data telah berhasil dihapus');
            return redirect()->route('rekap.index');
        } catch (\Exception $e) {
            return redirect()->route('rekap.index')->withErrors('Gagal menghapus data.');
        }
    }

    public function downloadPdf($id)
    {
        $rekap = Rekap::findOrFail($id);

        // Nama file PDF yang ada di direktori storage/app/public/pdf
        $bebaskompen = 'form bebas kompen.pdf';
        $path = 'public/pdf/' . $bebaskompen;

        if (!Storage::exists($path)) {
            return redirect()->route('rekap.index')->withErrors('File PDF tidak ditemukan.');
        }

        return Storage::download($path, $bebaskompen);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $rekap = Rekap::where('nama', 'LIKE', "%{$query}%")
                      ->orWhere('nim', 'LIKE', "%{$query}%")
                      ->orWhere('semester', 'LIKE', "%{$query}%")
                      ->orWhere('kompen', 'LIKE', "%{$query}%")
                      ->get();

        return view('rekap.index', compact('rekap'));
    }
}
