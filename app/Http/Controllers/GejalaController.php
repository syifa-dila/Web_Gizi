<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasiens;
use App\Models\Gejala;
use Illuminate\Support\Facades\Session;

class GejalaController extends Controller
{
    public function index()
    {
    $gejalas = Gejala::all(); // ⬅️ Ambil semua data dari tabel gejalas
    return view('gejala.index', compact('gejalas')); // ⬅️ Kirim ke view 
    }

    public function edit($id)
    {
    $gejalas = Gejala::findOrFail($id);
    return view('gejala.edit', compact('gejalas'));
    }

    public function update(Request $request, $id)
    {
    $validated = $request->validate([
        'code_symptom' => 'required|string|max:20|unique:gejalas,code_symptom,' . $id,
        'name_symptom' => 'required|string|max:255',
    ]);

    $gejalas = Gejala::findOrFail($id);
    $gejalas->update($validated);

    return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy($id)
    {
    $gejalas = Gejala::findOrFail($id);
    $gejalas->delete();

    $notification = [
            'message' => 'Rule berhasil ditambahkan',
            'alert-type' => 'success'
        ];

    return redirect()->route('gejala.index')->with($notification);
    }

    public function create()
    {
        return view('gejala.create');
    }


       public function tes()
    {
        if (!session()->has('pasien_id')) {
        return redirect()->route('pasien.create')->withErrors('Silakan isi data anak terlebih dahulu.');
    }

    $gejalas = Gejala::all(); 

    $pilihan = ['Sangat Yakin', 'Yakin', 'Cukup Yakin', 'Tidak Yakin'];

    return view('gejala.tes', compact('gejalas', 'pilihan'));
    }

     public function store(Request $request)
    {
    $validated = $request->validate([
        'code_symptom' => 'required|string|max:20|unique:gejalas,code_symptom',
        'name_symptom' => 'required|string|max:255',
    ]);

    Gejala::create($validated);

    return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }


    public function save(Request $request)
{
    $pasien_id = session('pasien_id');

    if (!$pasien_id) {
        return redirect()->route('gejala.create')->withErrors('Data anak belum diisi.');
    }

    $gejalas = Gejala::all();

    $jawaban = [];
    foreach ($gejalas as $gejala) {
        $kode = $gejala->code_symptom;
        $jawaban[$kode] = $request->input($kode); // contoh: ['GJ01' => 'Yakin', ...]
    }

    session(['jawaban_gejala' => $jawaban]);

    return redirect()->route('diagnoses.hasil');
}

}
