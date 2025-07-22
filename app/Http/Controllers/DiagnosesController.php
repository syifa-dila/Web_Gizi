<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Patient;
// use App\Models\Gejala;

use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Disease;
use App\Models\Diagnoses;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class DiagnosesController extends Controller
{
    public function index()
{
    $diagnoses = Diagnoses::with(['pasien', 'disease'])->latest()->get();

    return view('diagnoses.index', compact('diagnoses'));
}
    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'result_diagnosis' => 'required|string',
        'pasiens_id' => 'required|exists:pasiens,id',
        'gejalas_id' => 'required|exists:gejalas,id',
        'diseases_id' => 'required|exists:diseases,id',
        'rules_id' => 'required|exists:rules,id',
    ]);

    $diagnosis = Diagnoses::create([
        'code_diagnosis' => 'DX-' . time(), // Contoh kode unik
        'date' => $request->date,
        'result_diagnosis' => $request->result_diagnosis,
        'pasiens_id' => auth()->user()->pasiens_id,
        'gejalas_id' => $request->gejalas_id,
        'diseases_id' => $request->diseases_id,
        'rules_id' => $request->rules_id,
    ]);

    return redirect()->route('diagnoses.index')->with('success', 'Diagnosis berhasil disimpan.');
}
public function form()
{
    $gejalas = Gejala::all();
    $pilihan = [
            'Sangat Yakin' => 1.0,
            'Yakin' =>0.8,
            'Cukup Yakin' => 0.6,
            'Kurang Yakin' => 0.4,
            'Tidak Yakin' => 0.2,
            'Tidak' => 0.0
    ];

    return view('diagnoses.form', compact('gejalas', 'pilihan'));
}



public function hasil(Request $request)
{
    $jawaban = $request->jawaban; // input user
    $diseases = Disease::all();
    $hasil = [];

    foreach ($diseases as $disease) {
        $cfCombine = null;

        foreach ($jawaban as $gejalaId => $nilaiUser) {
            $rule = Rules::where('disease_id', $disease->id)
                        ->where('gejala_id', $gejalaId)
                        ->first();

            if ($rule) {
                $cf = $rule->cf_pakar * $nilaiUser;

                if (is_null($cfCombine)) {
                    $cfCombine = $cf;
                } else {
                    $cfCombine = $cfCombine + $cf * (1 - $cfCombine);
                }
            }
        }

        if (!is_null($cfCombine)) {
            $hasil[] = [
                'penyakit' => $disease,
                'cf' => round($cfCombine, 4),
            ];
        }
    }

    // Urutkan dari CF tertinggi
    $hasilFinal = collect($hasil)->sortByDesc('cf')->values();

    return view('diagnoses.hasil', compact('hasilFinal'));
}

}
