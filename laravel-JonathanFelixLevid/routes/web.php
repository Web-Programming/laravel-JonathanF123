<?php

use App\Http\Controllers\kurikulumcontroller;
use App\Http\Controllers\prodicontroller;
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



Route::get('/dosen', function (){
    return view('dosen');
});

Route::get('/dosen/index', function (){
    return view('dosen.index');
});

Route::get('/fakultas', function (){
    //return view('fakultas.index', ["ilkom" =>"Fakultas ilmu komputer dan rekayasa]);
    return view('fakultas.index', ["ilkom" => "Fakultas ilmu komputer dan rekayasa
    ", "Fakultas Ilmu Ekonomi"]);
});


Route::get('/fakultas', function (){
    //return view('fakultas.index', ["ilkom" =>"Fakultas ilmu komputer dan rekayasa]);
    // return view('fakultas.index', ["ilkom" => "Fakultas ilmu komputer dan rekayasa", "Fakultas Ilmu Ekonomi"]);
    // return view('fakultas.index')->with("fakultas",[ "Fakultas ilmu komputer dan rekayasa
    // ", "Fakultas Ilmu Ekonomi"]);

    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    //  return view('fakultas.index', compact('fakultas'));

    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = [];
    return view('fakultas.index', compact('fakultas', 'kampus'));

});

route::get('/prodi', [prodicontroller::class,'index']);
route::resource("/kurikulum",kurikulumcontroller::class);
 //tes di browser dengan mengunjungi
//1. http://localhost:8000/kurikulum/
//2. http://localhost:8000/kurikulum/create
//3. http://localhost:8000/kurikulum/1000
//4. http://localhost:8000/kurikulum/1000/edit

route::apiResource("/dosen",DosenController::class);
//tes di browser dengan mengunjungi
//1. http://localhost:8000/dosen/