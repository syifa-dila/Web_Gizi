<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Disease;
use App\Models\Diagnoses;
use Illuminate\Support\Facades\Auth;

class AlgoritmaController extends Controller
{
    public function proses(Request $request)
    {
        $jawabanUser = $request->input('jawaban'); // dari input radio form
        if (!$jawabanUser || !is_array($jawabanUser)) {
            return back()->withErrors('Jawaban tidak ditemukan.');
        }

        $hasilDiagnosa = [];

        $diseases = Disease::all();
        $gejalaIds = array_keys($jawabanUser);

        foreach ($diseases as $disease) {
            $rules = Rules::where('disease_id', $disease->id)
                ->whereIn('gejala_id', $gejalaIds)
                ->get();

            if ($rules->isEmpty()) continue;

            $cfCombine = 0;
            foreach ($rules as $rule) {
                $cfUser = (float) $jawabanUser[$rule->gejala_id]; // nilai dari input user
                $cfRule = $rule->cf_value; // nilai CF dari aturan
                $cf = $cfUser * $cfRule;

                $cfCombine = $cfCombine + $cf * (1 - $cfCombine);
            }

            if ($cfCombine > 0) {
                $hasilDiagnosa[] = [
                    'penyakit' => $disease->name_disease,
                    'cf' => round($cfCombine, 4),
                    'disease_id' => $disease->id,
                ];
            }
        }

        // Urutkan berdasarkan nilai CF tertinggi
        usort($hasilDiagnosa, fn($a, $b) => $b['cf'] <=> $a['cf']);

        if (!empty($hasilDiagnosa)) {
            $tertinggi = $hasilDiagnosa[0];
            $pasienId = Auth::user()->pasien?->id;

            Diagnoses::create([
                'code_diagnosis' => 'DX-' . time(),
                'date' => now(),
                'result_diagnosis' => $tertinggi['penyakit'] . ' (CF: ' . $tertinggi['cf'] . ')',
                'recommendation' => 'Segera konsultasi dengan tenaga medis.',
                'user_id' => Auth::id(),
                'pasien_id' => $pasienId,
            ]);
        }

        return view('diagnoses.hasil', [
            'hasilDiagnosa' => $hasilDiagnosa
        ]);
    }
}