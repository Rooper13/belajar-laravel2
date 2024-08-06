<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswacontroller;
use App\Models\mahasiswa;

//Route::get('/', function () {
    //return view('mahasiswa.mahasiswa');
//});

//Route::get('/mahasiswa', [mahasiswacontroller::class,  'nama function mahasiswa controller']);

Route::get('/create', function(){
    return view('mahasiswa.create');
});

Route::get('/show', function(){
    return view('mahasiswa.show');
});

Route::get('/index', function(){
    return view('mahasiswa.index');
});

Route::get('/edit', function(){
    return view('mahasiswa.edit');
});
// Route::get('/home', function () {
//     return view('mahasiswa.mahasiswa');
// });
Route::post('/store', 'App/Http/Controllers/mahasiswacontroller@insert');
Route::post('/insert', [mahasiswacontroller::class, 'insert']);
Route::get('/', [mahasiswacontroller::class, 'index']);
Route::get('/edit', [mahasiswacontroller::class, 'edit']);
//Route::post('/mhs/update', [mahasiswacontroller::class, 'update']);