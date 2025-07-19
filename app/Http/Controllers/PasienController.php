<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasiens;

class PasienController extends Controller
{
        public function create()
    {
        return view('pasien.create');
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:25',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'nama_ibu' => 'required|string|max:25',
            'nama_ayah' => 'required|string|max:25',
            'alamat' => 'required|string|max:100',
            'no_kk' => 'required|string|max:17',
            'no_tlp' => 'required|string|max:13',
            'riwayat_penyakit' => 'nullable|string|max:50',
            'alergi_makanan' => 'nullable|string|max:50',
            'alergi_obat' => 'nullable|string|max:50',
            'berat_badan' => 'required|numeric|min:1',
            'tinggi_badan' => 'required|numeric|min:1',
        ]);

        $pasien = Pasiens::create([
            'name' => $validated['nama'],
            'gender' => $validated['jenis_kelamin'],
            'birth_date' => $validated['tanggal_lahir'],
            'motherName' => $validated['nama_ibu'],
            'fatherName' => $validated['nama_ayah'],
            'address' => $validated['alamat'],
            'noKK' => $validated['no_kk'],
            'phone_number' => $validated['no_tlp'],
            'medical_History' => $validated['riwayat_penyakit'],
            'medical_Alergi' => $validated['alergi_makanan'],
            'drug_allergy' => $validated['alergi_obat'],
            'body_weight' => $validated['berat_badan'],
            'height' => $validated['tinggi_badan'],
        ]);

        session(['pasien_id' => $pasien->id]);

        return redirect()->route('gejala.tes')->with('success', 'Data pasien berhasil disimpan');
    }

}
