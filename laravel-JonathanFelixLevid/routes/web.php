<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Models\Fakultas;
use GuzzleHttp\Promise\Create;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth', 'verified'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware(['auth', 'verified'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware(['auth', 'verified'])->name('profile.destory');
});

// Route::get('fakultas', [FakultasController::class, 'index'])->middleware(['auth','verified','checkRole:admin,user'])->name('fakultas.index');


// Route::middleware(['auth' , 'verified', 'checkRole:admin'])->group(function(){
//     Route::get('fakultas/create',[FakultasController::class, 'create'])->name('fakultas.create');
// Route::delete('fakultas/{Fakultas}',[FakultasController::class, 'destroy'])->name('fakultas.destroy');
// Route::get('fakultas/{$Fakultas}/edit',[FakultasController::class, 'edit'])->name('fakultas.edit');
// Route::put('fakultas/{Fakultas}',[FakultasController::class, 'update'])->name('fakultas.update');
// Route::post('fakultas',[FakultasController::class, 'store'])->name('fakultas.store');
// });
Route:: resource('fakultas', FakultasController::class)->middleware(['auth', 'verified']);
Route:: resource('prodi', ProdiController::class)->middleware(['auth', 'verified']);
Route:: resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'verified']);
Route::get('/dashboard', [DashboardController::class, 'index']);
require _DIR_.'/auth.php';
