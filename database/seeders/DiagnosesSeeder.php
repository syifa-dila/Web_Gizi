<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diagnoses;

class DiagnosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Diagnoses::create([
            'user_id' => 1,
            'pasiens_id' => 1,
            'code_diagnosis' => 'DX-' . time(),
            'date' => now(),
            'diseases_id' => 3, // contoh penyakit hasil akhir (misal: Stunting)
            'result_diagnosis' => 0.85,
        ]);
    }
}
