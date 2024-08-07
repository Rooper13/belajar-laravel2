<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mhs = DB::table('mahasiswa')->get();
        return view('mahasiswa/show', ['mhs' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        DB::table('mahasiswa')->insert([
            'NRP' => $request->NRP,
            'Nama' => $request->Nama,
            'ALAMAT' => $request->ALAMAT,
            'No_hp' => $request->No_hp
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
    public function edit(Request $req)
    {
        //    $mhs= DB::table('mahasiswa')->where('id', $req->input('nrp'))->get();
        $mhs = DB::Selectone("
            SELECT
                *
            FROM
                mahasiswa
            WHERE
                nrp = '" . $req->input('nrp') . "'
       ");

        return view('mahasiswa/edit', ['mhs' => $mhs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
       $mhs = DB::table('mahasiswa')->where('NRP',$request->input('NRP'))->update([
            'NRP' => $request->input('NRP'),
            'Nama' => $request->input('Nama'),
            'ALAMAT' => $request->input('ALAMAT'),
            'No_hp' => $request->input('No_hp')
        ]);
        //dd($mhs);
        // return view('mahasiswa/edit', ['mhs' => $mhs]);
        return view('mahasiswa/show', ['mhs' => $mhs]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('mahasiswa')->where('nrp', $request->input('jack'))->delete();
        return redirect()->back();
    }
}
