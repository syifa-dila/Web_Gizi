<?php

namespace App\Http\Controllers;

use App\Models\Combination;
use App\Models\Diagnosis;
use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DiagnosisController extends Controller
{
public function index(Request $request)
{
    $query = Diagnosis::with(['pasien', 'disease']);

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $diagnoses = $query->latest()->get();

    return view('diagnosis.index', compact('diagnoses'));
}


    public function form()
    {
        $gejalas = Gejala::all();

        $pilihan = [
            'Sangat Yakin' => 1.0,
            'Yakin' => 0.8,
            'Cukup Yakin' => 0.6,
            'Kurang Yakin' => 0.4,
            'Tidak Yakin' => 0.2,
            'Tidak' => 0.0
        ];

        // Ambil pasien yang sedang login
        $pasiens = Pasien::where('user_id', Auth::id())->first();

        return view('diagnosis.form', compact('gejalas', 'pilihan', 'pasiens'));
    }

    public function proses($pasiens_id)
{
    $combinations = Combination::with('rules.disease')
        ->where('pasiens_id', $pasiens_id)
        ->get();

    if ($combinations->isEmpty()) {
        return back()->with('error', 'Belum ada data kombinasi CF untuk pasien ini.');
    }

    // Kelompokkan berdasarkan penyakit
    $grouped = $combinations->groupBy(function ($item) {
        return $item->rules->diseases_id;
    });

    $results = [];

    foreach ($grouped as $disease_id => $items) {
        $cf_values = $items->pluck('cf_value')->toArray();

        $cf_combine = $cf_values[0];
        for ($i = 1; $i < count($cf_values); $i++) {
            $cf_combine = $cf_combine + ($cf_values[$i] * (1 - $cf_combine));
            $cf_combine = round($cf_combine, 6);
        }

        $results[] = [
            'diseases_id' => $disease_id,
            'cf_combine' => $cf_combine,
        ];
    }

    // Ambil penyakit dengan nilai CF terbesar
    $best = collect($results)->sortByDesc('cf_combine')->first();

    // Simpan ke diagnosis
    $diagnosis = Diagnosis::create([
        'date' => now(),
        'result' => round($best['cf_combine'] * 100, 2),
        'user_id' => Auth::id(),
        'pasiens_id' => $pasiens_id,
        'diseases_id' => $best['diseases_id'],
    ]);

    return redirect()->route('diagnosis.hasil', $diagnosis->id);
}

public function hasil($id)
{
    $diagnosis = Diagnosis::with('pasien', 'disease')->findOrFail($id);
    $pasien = $diagnosis->pasien;

    // Ambil kombinasi berdasarkan pasien (karena dihubungkan lewat pasiens_id)
    $combinations = Combination::with('rules.disease')
        ->where('pasiens_id', $diagnosis->pasiens_id)
        ->get();

    // Hitung CF combine per penyakit
    $grouped = $combinations->groupBy(function ($item) {
        return $item->rules->diseases_id;
    });

    $results = [];

    foreach ($grouped as $disease_id => $items) {
        $cf_values = $items->pluck('cf_value')->toArray();

        $cf_combine = $cf_values[0];
        for ($i = 1; $i < count($cf_values); $i++) {
            $cf_combine = $cf_combine + ($cf_values[$i] * (1 - $cf_combine));
        }

        $results[] = [
            'disease' => $items->first()->rules->disease,
            'cf_combine' => round($cf_combine * 100, 2),
        ];
    }

    // Urutkan dari yang tertinggi
    $sortedResults = collect($results)->sortByDesc('cf_combine')->values();

    return view('diagnosis.hasil', [
        'diagnosis' => $diagnosis,
        'pasien' => $pasien,
        'disease' => $diagnosis->disease,
        'allResults' => $sortedResults,
    ]);
    return view('diagnosis.hasil', ['diagnosis' => $diagnosis,'pasien' => $pasien,'disease' => $diagnosis->disease,'allResults' => $sortedResults,]);

}

public function destroy($id)
{
    $diagnosis = Diagnosis::findOrFail($id);
    $diagnosis->delete();

    return redirect()->route('diagnosis.index')->with('success', 'Diagnosis berhasil dihapus.');

}
}
