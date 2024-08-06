<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.mahasiswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
            DB::table('mahasiswa')->insert([
            'NRP' => $request->NRP,
            'Nama' => $request->Nama,
            'ALAMAT'=> $request->ALAMAT,
            'No_hp'=> $request->No_hp
        ]);
        return redirect('/mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        DB::table('mahasiswa')-> where('id', $id)-> get();
        return view('mahasiswa/show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('mahasiswa')->where('id',$request->id)->update([
            'NRP' => $request->NRP,
            'Nama' => $request->Nama,
            'ALAMAT'=> $request->ALAMAT,
            'No_hp'=> $request->No_hp
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('mahasiswa')->where('id', $request->id)->delete();
        return redirect()->back();
    }
}
