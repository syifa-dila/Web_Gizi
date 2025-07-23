<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Disease;
use App\Models\Diagnosis;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosis::with(['pasien', 'disease'])->latest()->get();

        return view('diagnosis.index', compact('diagnosis'));
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

        $diagnosis = Diagnosis::create([
            'user_id' => Auth::id(),
            'code_diagnosis' => 'DX-' . time(),
            'date' => $request->date,
            'result_diagnosis' => $request->result_diagnosis,
            'pasiens_id' => auth()->user()->pasiens_id,
            'gejalas_id' => $request->gejalas_id,
            'diseases_id' => $request->diseases_id,
            'rules_id' => $request->rules_id,
        ]);

        return redirect()->route('diagnosis.index')->with('success', 'Diagnosis berhasil disimpan.');
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

    public function hasil(Request $request)
    {
        $diagnosis = Diagnosis::with(['disease', 'user.pasien'])->find(session('last_diagnosis_id'));

        if ($diagnosis) {
            return view('diagnosis.hasil', [
                'diagnosa' => $diagnosis,
                'penyakit' => $diagnosis->disease,
                'nilai_cf' => $diagnosis->nilai_cf,
            ]);
        }

        return view('diagnosis.hasil')->with('error', 'Tidak ada hasil diagnosa yang ditemukan.');
    }
}
