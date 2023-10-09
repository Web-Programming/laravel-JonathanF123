<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Buat Route ke halaman Profil
Route::get('/kata', function () {
    return view('kata');
});

//Route dengan parameter wajib
Route::get('/mahasiswa/{nama}', function ($nama = "Jonathan Felix Levid" ) {
    echo "<h1>Halo Nama Saya $nama</h2>";
    
});

//Route dengan parameter ( tidak wajib)
Route::get('/mahasiswa2/{nama?}', function ($nama = "Jonathan Felix Levid" ) {
    echo "<h1>Halo Nama Saya $nama</h2>";
    
});

//Route denga nparameter 
Route::get('/kata/{nama}/{pekerjaan?}', function ($nama = "Jonathan Felix Levid", $pekerjaan = "Mahasiswa") {
    echo "<h1>Halo Nama Saya $nama, Pekerjaan saya adalah $pekerjaan</h2>";
    
});

//Redirect
Route::redirect('/hubungi', function () {
    echo "<h1>Hubungi kami</h1>";
    
})->name("call");//name routed

Route::redirect('/contact', '/hubungi');

Route::redirect('/halo', function () {
    echo "<a href='". route('call') . "'>" . route('call'). "</a>";
    
});

Route::prefix('/mahasiswa')->group(function(){
    Route::get('/jadwal', function(){
        echo "<h1>Jadwal Mahasiswa</h1>";
    });
    Route::get('/materi', function(){
        echo "<h1>Materi Perkuliahan</h1>";
    });
});