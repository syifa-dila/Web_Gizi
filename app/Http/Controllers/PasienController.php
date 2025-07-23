<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;



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

        $pasien = Pasien::create([
            'user_id' => Auth::id(),
            'name' => $request->nama,
            'gender' => $request->jenis_kelamin,
            'birth_date' => $request->tanggal_lahir,
            'motherName' => $request->nama_ibu,
            'fatherName' => $request->nama_ayah,
            'address' => $request->alamat,
            'noKK' => $request->no_kk,
            'phone_number' => $request->no_tlp,
            'medical_History' => $request->riwayat_penyakit,
            'medical_Alergi' => $request->alergi_makanan,
            'drug_allergy' => $request->alergi_obat,
            'body_weight' => $request->berat_badan,
            'height' => $request->tinggi_badan,
        ]);

        session(['pasien_id' => $pasien->id]);

        return redirect()->route('diagnosis.form')->with('success', 'Data pasien berhasil disimpan');
    }

}
