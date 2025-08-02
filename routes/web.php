<?php

use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\AlgoritmaController;
use App\Http\Controllers\ResultCfController;
use App\Http\Controllers\CombinationController;
use App\Http\Controllers\RiwayatDiagnosisController;
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

Route::get('/dashboard', function () {return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//pasien & admin
Route::middleware('auth')->group(function () {
    Route::get('/diagnosis/hasil/{id}', [DiagnosisController::class, 'hasil'])->name('diagnosis.hasil');   

});
//route gejala role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/gejala/index', [GejalaController::class, 'index'])->name('gejala.index');
    Route::post('/gejala/store', [GejalaController::class, 'store'])->name('gejala.store');
    Route::get('/gejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
    Route::put('/gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
});

//route diagnosis role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
    Route::delete('/diagnosis/{id}', [DiagnosisController::class, 'destroy'])->name('diagnosis.destroy');
});

//Diagnosis
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/diagnosis/form', [DiagnosisController::class, 'form'])->name('diagnosis.form');
    Route::get('/diagnosis/proses/{pasiens_id}', [DiagnosisController::class, 'proses'])->name('diagnosis.proses');
});


//riwayatDiagnosis
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/riwayat-diagnosis', [RiwayatDiagnosisController::class, 'index'])->name('riwayat.index');
});

//resultCF
Route::middleware('auth')->group(function (){
Route::post('/resultcf/store', [ResultCfController::class, 'store'])->name('resultcf.store');
Route::post('/diagnosis/store', [ResultCfController::class, 'store'])->name('diagnosis.store');
Route::get('/resultcf/{pasiens_id}', [ResultCfController::class, 'show'])->name('resultcf.show');
});

//combine
Route::middleware(['auth', 'role:pasien'])->group(function () {
Route::get('/combination/process/{pasiens_id}', [CombinationController::class, 'process'])->name('combination.process');
Route::get('/combination/show/{pasiens_id}', [CombinationController::class, 'show'])->name('combinations.show');

});

// Penyakit
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/penyakit/index', [DiseaseController::class, 'index'])->name('penyakit.index');
    Route::post('/penyakit/store', [DiseaseController::class, 'store'])->name('penyakit.store');
    Route::get('/penyakit/{id}/edit', [DiseaseController::class, 'edit'])->name('penyakit.edit');
    Route::put('/penyakit/{id}', [DiseaseController::class, 'update'])->name('penyakit.update');
    Route::delete('/penyakit/{id}', [DiseaseController::class, 'destroy'])->name('penyakit.destroy');
});

//pasien
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::middleware(['auth'])->group(function () {
    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
});


//InfoPenyakit

    Route::get('/Ipenyakit/create', function () {return view('Ipenyakit.create');})->name('Ipenyakit.create');
    Route::get('/Ipenyakit/index', function () {return view('Ipenyakit.index');})->name('Ipenyakit.index');


// Daftar Pengguna
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
});;

// Kelola Nilai CF
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/rules/index', [RuleController::class, 'index'])->name('rules.index');
    Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
    Route::post('/rules/store', [RuleController::class, 'store'])->name('rules.store');
    Route::get('/rules/{id}/edit', [RuleController::class, 'edit'])->name('rules.edit');
    Route::put('/rules/{id}', [RuleController::class, 'update'])->name('rules.update');
    Route::delete('/rules/{id}', [RuleController::class, 'destroy'])->name('rules.destroy');
});

//jamOprasional
Route::get('/jam-operasional', function () {
    return view('jamoperasional');
})->name('jam.operasional');


require __DIR__.'/auth.php';
