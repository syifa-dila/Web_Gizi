<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnoses;
use App\Models\DiagnosisGejala;

class DiagnosisGejalaSeeder extends Seeder
{
    public function run(): void
    {
       $diagnosis = Diagnoses::first(); // ambil diagnosis yang sudah dibuat

        if (!$diagnosis) {
            echo "Diagnosis belum ada!\n";
            return;
        }

        for ($i = 1; $i <= 26; $i++) {
            DiagnosisGejala::create([
                'diagnoses_id' => $diagnosis->id,
                'gejala_id' => $i, // pastikan gejala_id 1-26 tersedia di tabel gejala
               // 'cf_user' => 1.0 // misalnya semua 'Sangat Yakin'
            ]);
        }
    }
}
