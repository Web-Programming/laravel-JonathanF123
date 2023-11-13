<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\kurikulumcontroller;
use App\Http\Controllers\MahasiswaController;
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
// Route::get('/mahasiswa/{nama}', function ($nama = "Jonathan Felix Levid" ) {
//     echo "<h1>Halo Nama Saya $nama</h2>";

// });

//Route dengan parameter ( tidak wajib)
Route::get('/mahasiswa2/{nama?}', function ($nama = "Jonathan Felix Levid" ) {
    echo "<h1>Halo Nama Saya $nama</h2>";

});

//Route denga nparameter
// Route::get('/kata/{nama}/{pekerjaan?}', function ($nama = "Jonathan Felix Levid", $pekerjaan = "Mahasiswa") {
//     echo "<h1>Halo Nama Saya $nama, Pekerjaan saya adalah $pekerjaan</h2>";

// });

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

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class,'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class,'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class,'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class,'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class,'allJoinFacade']);
Route::get('/prodi/all-join-elq', [ProdiController::class,'allJoinElq']);
Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class,'allJoinElq']);

//create data
Route::get('/prodi/create', [ProdiController::class,'create'])->name('prodi.create');
Route::post('prodi/store', [ProdiController::class,'store']);

//Read data
 Route::get('/prodi', [ProdiController::class,'index'])->name('prodi.index');
 Route::get('/prodi/{prodi}', [ProdiController::class,'show'])->name('prodi.show');

 Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
 Route::patch('/prodi/{prodi}', [ProdiController::class,'update'])->name('prodi.update');
 Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');