<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GejalaController extends Controller
{
    public function index()
{
    // contoh: menampilkan list data anak yang sudah disimpan
    return view('gejala.index'); // pastikan view ini ada
}
    /**
     * Menampilkan halaman form data anak (step 1)
     */
    public function create()
    {
        return view('gejala.create'); // pastikan file view-mu ada di resources/views/create.blade.php
    }

    /**
     * Menyimpan data anak dan lanjut ke tahap berikutnya
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggal_lahir' => 'required|date',
        'nama_ibu' => 'required|string|max:255',
        'nama_ayah' => 'required|string|max:255',
        'alamat' => 'required|string',
        'no_kk' => 'required|string|max:30',
        'no_tlp' => 'required|string|max:20',
        'riwayat_penyakit' => 'nullable|string',
        'alergi_makanan' => 'nullable|string',
        'alergi_obat' => 'nullable|string',
        'berat_badan' => 'required|numeric|min:1',
        'tinggi_badan' => 'required|numeric|min:1',
    ]);

    Session::put('data_anak', $validated);

    return redirect()->route('diagnosis.gejala'); // ganti sesuai halaman selanjutnya
}


    /**
     * (Opsional) Menampilkan form gejala (step 2)
     */
    public function gejala()
    {
        $dataAnak = Session::get('data_anak');
        return view('gejala', compact('dataAnak'));
    }
}
