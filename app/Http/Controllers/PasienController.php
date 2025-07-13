<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
//     public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:50',
//         'gender' => 'required|in:Laki-laki,Perempuan',
//         'birth_date' => 'required|date',
//         'motherName' => 'nullable|string|max:50',
//         'fatherName' => 'nullable|string|max:50',
//         'address' => 'nullable|string',
//         'noKK' => 'nullable|string|max:16',
//         'phone_number' => 'nullable|string|max:13',
//         'medical_History' => 'nullable|string',
//         'medical_Alergi' => 'nullable|string',
//         'drug_allergy' => 'nullable|string',
//         'body_weight' => 'nullable|numeric',
//         'height' => 'nullable|numeric',
//     ]);

//     Pasiens::create([
//         'name' => $request->name,
//         'gender' => $request->gender,
//         'birth_date' => $request->birth_date,
//         'motherName' => $request->motherName,
//         'fatherName' => $request->fatherName,
//         'address' => $request->address,
//         'noKK' => $request->noKK,
//         'phone_number' => $request->phone_number,
//         'medical_History' => $request->medical_History,
//         'medical_Alergi' => $request->medical_Alergi,
//         'drug_allergy' => $request->drug_allergy,
//         'body_weight' => $request->body_weight,
//         'height' => $request->height,
//     ]);

//     return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil disimpan.');
// }

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
