<?php

namespace App\Http\Controllers;

use App\Models\Diagnoses;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiagnosesController extends Controller
{

    public function store(Request $request)
{
    $nilai_cf_user = [
        'Sangat Yakin' =>  1.0,
        'Yakin' => 0.8,
        'Cukup Yakin' => 0.6,
        'Kurang Yakin' => 0.4,
        'Tidak Yakin' => 0.2,
        'Tidak' => 0.0,
    ];

    $jawaban = session('jawaban_gejala'); // ['GJ-01' => 'Yakin', ...]
    $rules = Rule::with(['disease', 'gejala'])->get();

    $hasil_cf = [];

    foreach ($rules as $rule) {
        $kode_gejala = $rule->gejala->code_symptom;

        if (isset($jawaban[$kode_gejala])) {
            $cf_user = $nilai_cf_user[$jawaban[$kode_gejala]];
            $cf_pakar = $rule->CF_pakar;
            $cf = $cf_user * $cf_pakar;

            // Simpan nilai sementara untuk kombinasi
            $hasil_cf[$rule->disease_id][] = $cf;
        }
    }

    // Hitung CF Combine per penyakit
    $cf_tertinggi = 0;
    $id_tertinggi = null;

    foreach ($hasil_cf as $disease_id => $cf_values) {
        $cf_combine = $cf_values[0];
        for ($i = 1; $i < count($cf_values); $i++) {
            $cf_combine = $cf_combine + $cf_values[$i] * (1 - $cf_combine);
        }

        if ($cf_combine > $cf_tertinggi) {
            $cf_tertinggi = $cf_combine;
            $id_tertinggi = $disease_id;
        }
    }

    $penyakit_terdeteksi = Disease::find($id_tertinggi);

    Diagnoses::create([
        'code_diagnosis' => 'DX-' . strtoupper(Str::random(6)),
        'date' => now(),
        'result_diagnosis' => $penyakit_terdeteksi->name_disease,
        'recommendation' => $penyakit_terdeteksi->suggestion,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('diagnoses.hasil')->with('success', 'Diagnosis berhasil diproses.');
}
    // public function store(Request $request)
    // {
    //     // 1. Ambil data yang dibutuhkan dari form gejala atau session
    //     $hasil = 'Gizi Buruk - Marasmus'; // (contoh) hasil dari proses perhitungan CF
    //     $rekomendasi = 'Segera bawa ke puskesmas';

    //     // 2. Simpan ke database
    //     Diagnoses::create([
    //         'kode_diagnosis' => 'DX-' . Str::random(6),
    //         'tanggal' => now(),
    //         'hasil_diagnosis' => $hasil,
    //         'rekomendasi' => $rekomendasi,
    //         'pasien_id' => session('anak_id'), // dari sesi pendaftaran
    //         'admin_id' => auth()->id() ?? null, // jika admin login
    //         'aturan_id' => 1, // contoh id aturan
    //     ]);

    //     // 3. Redirect ke halaman hasil
    //     return redirect()->route('diagnoses.hasil')->with('success', 'Hasil diagnosis berhasil disimpan.');
    // }

    // public function hasil()
    // {
    //     $diagnoses = Diagnoses::latest()->first(); // atau berdasarkan pasien/session

    //     return view('diagnoses.hasil', compact('diagnoses'));
    // }
}
