<?php

namespace App\Http\Controllers;

use App\Models\Diagnoses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiagnosesController extends Controller
{
    public function store(Request $request)
    {
        // 1. Ambil data yang dibutuhkan dari form gejala atau session
        $hasil = 'Gizi Buruk - Marasmus'; // (contoh) hasil dari proses perhitungan CF
        $rekomendasi = 'Segera bawa ke puskesmas';

        // 2. Simpan ke database
        Diagnoses::create([
            'kode_diagnosis' => 'DX-' . Str::random(6),
            'tanggal' => now(),
            'hasil_diagnosis' => $hasil,
            'rekomendasi' => $rekomendasi,
            'pasien_id' => session('anak_id'), // dari sesi pendaftaran
            'admin_id' => auth()->id() ?? null, // jika admin login
            'aturan_id' => 1, // contoh id aturan
        ]);

        // 3. Redirect ke halaman hasil
        return redirect()->route('diagnoses.hasil')->with('success', 'Hasil diagnosis berhasil disimpan.');
    }

    public function hasil()
    {
        $diagnoses = Diagnoses::latest()->first(); // atau berdasarkan pasien/session

        return view('diagnoses.hasil', compact('diagnoses'));
    }
}
