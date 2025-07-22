<?php

use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DiagnosesController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\AlgoritmaController;
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
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//route Gejala
Route::middleware('auth')->group(function () {
    Route::get('/gejala/index', [GejalaController::class, 'index'])->name('gejala.index');
    // Route::get('/gejala/create', [GejalaController::class, 'create'])->name('gejala.create');
    Route::post('/gejala/store', [GejalaController::class, 'store'])->name('gejala.store');
    Route::get('/gejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
    Route::put('/gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
});

//Diagnosis
Route::middleware('auth')->group(function (){
        // Route::post('/diagnosis/save', [DiagnosesController::class, 'save'])->name('diagnoses.save');
        // Route::get('/diagnoses/create', [DiagnosesController::class, 'create'])->name('diagnoses.create');
        // Route::get('/diagnosis/form/{id}', [DiagnosesController::class, 'form'])->name('diagnosis.form');
        Route::get('/diagnoses/form', [DiagnosesController::class, 'form'])->name('diagnoses.form');
        Route::post('/diagnoses/hasil', [DiagnosesController::class, 'hasil'])->name('diagnoses.hasil');
        Route::get('/diagnoses/index', [DiagnosesController::class, 'index'])->name('diagnoses.index');
        Route::post('/diagnoses/store', [DiagnosesController::class, 'store'])->name('diagnoses.store');
        Route::post('/diagnoses/proses', [AlgoritmaController::class, 'proses'])->name('diagnoses.proses');



});

//penyakit
Route::middleware('auth')->group(function(){
    Route::get('/penyakit/index', [DiseaseController::class, 'index'])->name('penyakit.index');
    Route::post('/penyakit/store', [DiseaseController::class, 'store'])->name('penyakit.store');
    Route::get('/penyakit/{id}/edit', [DiseaseController::class, 'edit'])->name('penyakit.edit');
    Route::put('/penyakit/{id}', [DiseaseController::class, 'update'])->name('penyakit.update');
    Route::delete('/penyakit/{id}', [DiseaseController::class, 'destroy'])->name('penyakit.destroy');
});

//pasien
Route::middleware(['auth'])->group(function () {
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
});


//InfoPenyakit
Route::middleware('auth')->group(function () {
    Route::get('/Ipenyakit/create', function () {return view('Ipenyakit.create');})->name('Ipenyakit.create');
    Route::get('/Ipenyakit/index', function () {return view('Ipenyakit.index');})->name('Ipenyakit.index');
});

//user
Route::middleware('auth')->group(function (){
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
});

//kelola nilai CF
Route::middleware('auth')->group(function (){
    Route::get('/rules/index', [RuleController::class, 'index'])->name('rules.index');
    Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
    Route::post('/rules/store', [RuleController::class, 'store'])->name('rules.store');
    Route::get('/rules/{id}/edit', [RuleController::class, 'edit'])->name('rules.edit');
    Route::put('/rules/{id}', [RuleController::class, 'update'])->name('rules.update');
    Route::delete('/rules/{id}', [RuleController::class, 'destroy'])->name('rules.destroy');


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
