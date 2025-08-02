<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combination;
use App\Models\Result_cf;
use App\Models\Rules;
use App\Models\Disease;
use App\Models\Pasien;

class CombinationController extends Controller
{
    public function process($pasiens_id)
    {

        // Ambil semua input gejala user berdasarkan pasien
        $result_cf = Result_cf::where('pasiens_id', $pasiens_id)->get();

        // Jika tidak ada input dari user
        if ($result_cf->isEmpty()) {
            return back()->with('error', 'Belum ada data gejala yang dipilih.');
        }

        // Hapus data combination lama untuk pasien ini
        foreach ($result_cf as $rcf) {
            Combination::where('result_cf_id', $rcf->id)->delete();
        }

        // Proses dan simpan kombinasi CF
        foreach ($result_cf as $rcf) {
            $rules = Rules::where('gejalas_id', $rcf->gejalas_id)->get();
            if ($rules->isEmpty()) {
                return back()->with('error', 'Gejala yang dipilih belum punya aturan diagnosa. Hubungi admin.');
            }
            foreach ($rules as $rule) {
                $cf_user  = $rcf->nilai_cf;
                $cf_pakar = $rule->cf_pakar;
                Combination::create([
                    'pasiens_id'    => $pasiens_id,
                    'diseases_id'    => $rule->diseases_id,
                    'result_cf_id'  => $rcf->id,
                    'rules_id'      => $rule->id,
                    'cf_value'      => round($cf_user * $cf_pakar, 1),
                ]);
            }
        }
return redirect()->route('combinations.show', ['pasiens_id' => $pasiens_id])
    ->with('success', 'Proses diagnosa berhasil.');

        // return redirect()->route('combinations.show', $pasiens_id)->with('success', 'Proses diagnosa berhasil.');
    }


    public function show($pasiens_id)
    {
        $combinations = Combination::with([
            'result_cf.gejala',   // untuk akses nama gejala dan cf_user
            'rules.disease'       // untuk akses nama penyakit dan cf_pakar
        ])
        ->whereHas('result_cf', function ($query) use ($pasiens_id) {
            $query->where('pasiens_id', $pasiens_id);
        })
        ->get();

        // Kelompokkan berdasarkan penyakit
        $grouped = [];

        foreach ($combinations as $item) {
            $diseases_id = $item->rules->diseases_id;
            $cf = $item->cf_value;

            if (!isset($grouped[$diseases_id])) {
                $grouped[$diseases_id] = [
                    'disease' => $item->rules->disease,
                    'cf_combine' => $cf
                ];
            } else {
                // Combine CF sesuai rumus CF kombinasi
                $existing = $grouped[$diseases_id]['cf_combine'];
                $grouped[$diseases_id]['cf_combine'] = $existing + ($cf * (1 - $existing));
            }
        }

        // Urutkan berdasarkan nilai cf tertinggi
        $sorted = collect($grouped)->sortByDesc('cf_combine');

        $pasien = Pasien::findOrFail($pasiens_id);
        $result_cf = Result_cf::with(['gejala', 'rules'])
        ->where('pasiens_id', $pasiens_id)
        ->get();


        return view('combinations.show', [
            'pasien' => $pasien,
            'combinations_raw' => $combinations,
        ]);
    }
}
