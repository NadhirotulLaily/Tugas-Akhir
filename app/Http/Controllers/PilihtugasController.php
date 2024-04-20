<?php


namespace App\Http\Controllers;

use App\Models\pilihtugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PilihtugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
        $users = DB::table('users')
        ->when($request->input('search'),function ($query, $search){
            $query->where('name','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%');
        })
        ->paginate(10);
        return view ('pilihtugas.index', compact ('users'));
    }

    public function showUploadForm()
    {
        return view('pilihtugas.upload'); // Ganti dengan nama view Anda yang sesuai
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function show(pilihtugas  $pilihtugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Responseonse
     */
    public function edit(pilihtugas  $pilihtugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pilihtugas $pilihtugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pilihtugas  $pilihtugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(pilihtugas  $pilihtugas)
    {
        //
    }
}
