<?php

use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DiagnosesController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//route Gejala
Route::middleware('auth')->group(function () {
    Route::get('/gejala/index', [GejalaController::class, 'index'])->name('gejala.index');
    Route::get('/gejala/create', [GejalaController::class, 'create'])->name('gejala.create');
    Route::post('/gejala/store', [GejalaController::class, 'store'])->name('gejala.store');
    Route::get('/gejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
    Route::put('/gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/gejala/tes', [GejalaController::class, 'tes'])->name('gejala.tes');
    // Route::get('/gejala/save', [GejalaController::class, 'save'])->name('gejala.save');
    Route::post('/gejala/save', [GejalaController::class, 'save'])->name('gejala.save');
});

Route::middleware('auth')->group(function (){
    Route::get('diagnoses/hasil', [DiagnosesController::class, 'hasil'])->name('diagnoses.hasil');
});

//InfoPenyakit
Route::middleware('auth')->group(function () {
    Route::get('/Ipenyakit/create', function () {return view('Ipenyakit.create');})->name('Ipenyakit.create');
    Route::get('/Ipenyakit/index', function () {return view('Ipenyakit.index');})->name('Ipenyakit.index');
});

// Route::middleware('auth')->group(function () {
// Route::get('/Ipenyakit/create', function () { return view('Ipenyakit.create');});
// Route::get('/Ipenyakit/index', function () { return view('Ipenyakit.index');});
// });

//jamOprasional
Route::get('/jam-operasional', function () {
    return view('jamoperasional');
})->name('jam.operasional');


require __DIR__.'/auth.php';
