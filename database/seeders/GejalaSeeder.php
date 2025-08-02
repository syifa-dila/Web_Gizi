<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejalas = [
            ['code_symptom' => 'GJ01', 'name_symptom' => 'Berat badan sangat rendah (Kurus ekstrem)'],
            ['code_symptom' => 'GJ02', 'name_symptom' => 'Pipi cekung dan wajah seperti orang tua'],
            ['code_symptom' => 'GJ03', 'name_symptom' => 'Perut buncit bukan karena gemuk'],
            ['code_symptom' => 'GJ04', 'name_symptom' => 'Tangan atau kaki bengkak, tubuh membengkak disertai demam'],
            ['code_symptom' => 'GJ05', 'name_symptom' => 'Perubahan warna rambut menjadi merah atau kusam'],
            ['code_symptom' => 'GJ06', 'name_symptom' => 'Tinggi badan sangat pendek dibanding usia'],
            ['code_symptom' => 'GJ07', 'name_symptom' => 'Penurunan berat badan sangat cepat'],
            ['code_symptom' => 'GJ08', 'name_symptom' => 'Mudah lelah meski sedikit aktivitas'],
            ['code_symptom' => 'GJ09', 'name_symptom' => 'Pucat pada kulit, bibir atau kelopak mata'],
            ['code_symptom' => 'GJ10', 'name_symptom' => 'Kesulitan melihat saat cahaya redup (rabun senja)'],
            ['code_symptom' => 'GJ11', 'name_symptom' => 'Mata kering atau produksi air mata menurun'],
            ['code_symptom' => 'GJ12', 'name_symptom' => 'Luka kecil sulit sembuh atau kering'],
            ['code_symptom' => 'GJ13', 'name_symptom' => 'Nafsu makan menurun'],
            ['code_symptom' => 'GJ14', 'name_symptom' => 'Rentan infeksi seperti flu atau demam'],
            ['code_symptom' => 'GJ15', 'name_symptom' => 'Aktivitas fisik menurun'],
            ['code_symptom' => 'GJ16', 'name_symptom' => 'Sulit fokus saat beraktivitas atau bermain'],
            ['code_symptom' => 'GJ17', 'name_symptom' => 'Mengantuk di siang hari'],
            ['code_symptom' => 'GJ18', 'name_symptom' => 'Lambat bicara atau tidak merespon dengan baik'],
            ['code_symptom' => 'GJ19', 'name_symptom' => 'Perkembangan motorik terlambat (duduk, berdiri, berjalan)'],
            ['code_symptom' => 'GJ20', 'name_symptom' => 'Sering menangis tanpa sebab (rewel)'],
            ['code_symptom' => 'GJ21', 'name_symptom' => 'Tulang menonjol (terlihat jelas pada rusuk/lengan)'],
            ['code_symptom' => 'GJ22', 'name_symptom' => 'Kulit tipis, mudah lecet atau memar'],
            ['code_symptom' => 'GJ23', 'name_symptom' => 'Sering pusing atau memegang kepala terus menerus'],
            ['code_symptom' => 'GJ24', 'name_symptom' => 'Berat badan sangat tinggi (obesitas)'],
            ['code_symptom' => 'GJ25', 'name_symptom' => 'Gangguan pencernaan (sembelit atau diare berkepanjangan)'],
            ['code_symptom' => 'GJ26', 'name_symptom' => 'Pembesaran di leher atau godok'],
        ];

        DB::table('gejalas')->insert($gejalas);

    }
}
