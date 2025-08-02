<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultCfController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all()); 
        $request->validate([
            'pasiens_id' => 'required|exists:pasiens,id',
            'gejala' => 'required|array',
        ]);

        $pasiensId = $request->input('pasiens_id');
        $gejalaInput = $request->input('gejala'); // [gejala_id => nilai_cf]

        foreach ($gejalaInput as $gejalasId => $cf) {
            DB::table('result_cf')->insert([
                'pasiens_id' => $pasiensId,
                'gejalas_id' => $gejalasId,
                'nilai_cf' => $cf,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Langsung lanjut ke proses combine
        // return redirect()->route('combination.process', ['pasiens_id' => $pasiensId]);
        return redirect()->route('resultcf.show', ['pasiens_id' => $pasiensId])
        ->with('success', 'Data berhasil disimpan. Lihat hasil CF sebelum melanjutkan.');

    }

    public function show($pasiens_id)
    {
        $data = DB::table('result_cf')
            ->join('gejalas', 'result_cf.gejalas_id', '=', 'gejalas.id')
            ->where('result_cf.pasiens_id', $pasiens_id)
            ->select('gejalas.name_symptom as gejala', 'result_cf.nilai_cf')
            ->get();

        return view('resultcf.show', [
            'hasil_cf' => $data,
            'pasiens_id' => $pasiens_id
        ]);
        
        return redirect()->route('combination.process', ['pasiens_id' => $pasiensId]);

    }
    
}
