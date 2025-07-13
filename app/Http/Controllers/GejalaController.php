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
        return redirect()->route('gejala.create')->withErrors('Silakan isi data anak terlebih dahulu.');
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


// public function store(Request $request)
// {
//     $validated = $request->validate([
//         'nama' => 'required|string|max:255',
//         'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
//         'tanggal_lahir' => 'required|date',
//         'nama_ibu' => 'required|string|max:255',
//         'nama_ayah' => 'required|string|max:255',
//         'alamat' => 'required|string',
//         'no_kk' => 'required|string|max:30',
//         'no_tlp' => 'required|string|max:20',
//         'riwayat_penyakit' => 'nullable|string',
//         'alergi_makanan' => 'nullable|string',
//         'alergi_obat' => 'nullable|string',
//         'berat_badan' => 'required|numeric|min:1',
//         'tinggi_badan' => 'required|numeric|min:1',
//     ]);

//     $pasien = Pasiens::create([
//         'name' => $validated['nama'],
//         'gender' => $validated['jenis_kelamin'],
//         'birth_date' => $validated['tanggal_lahir'],
//         'motherName' => $validated['nama_ibu'],
//         'fatherName' => $validated['nama_ayah'],
//         'address' => $validated['alamat'],
//         'noKK' => $validated['no_kk'],
//         'phone_number' => $validated['no_tlp'],
//         'medical_History' => $validated['riwayat_penyakit'],
//         'medical_Alergi' => $validated['alergi_makanan'],
//         'drug_allergy' => $validated['alergi_obat'],
//         'body_weight' => $validated['berat_badan'],
//         'height' => $validated['tinggi_badan'],
//     ]);

//         session(['pasien_id' => $pasien->id]);

//     // Session::put('data_anak', $validated);

//     return redirect()->route('gejala.tes')->with('success', 'data pasien berhasil disimpan');
// }

// public function save(Request $request){
//     // Simpan jawaban ke session (sementara), atau langsung ke tabel jika kamu punya
//     session([
//         'jawaban_gejala' => [
//             'kurus' => $request->kurus,
//             'lesu' => $request->lesu,
//             'keriput' => $request->keriput,
//         ]
//     ]);

//     // Redirect ke proses diagnosis atau halaman hasil
//     return redirect()->route('gejala.tes'); // atau diagnosis.hasil jika kamu langsung hitung
// }


    /**
     * (Opsional) Menampilkan form gejala (step 2)
     */
    // public function gejala()
    // {
    //     $dataAnak = Session::get('data_anak');
    //     return view('gejala', compact('dataAnak'));
    // }

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
