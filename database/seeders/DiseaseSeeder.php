<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Disease;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $diseases = [
            [
                'disease_code' => 'P01',
                'name_disease' => 'Marasmus',
                'information' => 'Bentuk malnutrisi energi-protein berat yang ditandai dengan tubuh sangat kurus, kehilangan lemak dan otot, wajah seperti orang tua.',
                'suggestion' => 'Perawatan dirumah:Beri makanan tinggi kalori dan protein secara bertahap, Tambahkan suplemen vitamin dan mineral, Rawat infeksi dan dehidrasi, Pemantauan berat badan dan pertumbuhan rutin'
            ],
            [
                'disease_code' => 'P02',
                'name_disease' => 'Kwashiorkor',
                'information' => 'Malnutrisi akibat kekurangan protein, meski asupan kalori cukup. Anak tampak bengkak (edema), terutama di kaki.',
                'suggestion' => 'Perawatan dirumah : Pemberian makanan tinggi protein, Suplemen vitamin dan mineral, khususnya seng dan vitamin A, Penanganan infeksi'
            ],
            [
                'disease_code' => 'P03',
                'name_disease' => 'Stunting',
                'information' => 'Pertumbuhan tinggi badan yang terhambat akibat malnutrisi kronis, biasanya sejak masa kehamilan hingga usia 2 tahun',
                'suggestion' => 'Perawatan dirumah: Pemenuhan gizi seimbang sejak bayi, Suplementasi zat besi, vitamin A, zinc, Edukasi ibu tentang MP-ASI dan gizi, Pantau pertumbuhan setiap bulan'
            ],
            [
                'disease_code' => 'P04',
                'name_disease' => 'Wasting',
                'information' => 'Kondisi anak terlalu kurus untuk tinggi badannya, sering akibat infeksi akut dan kekurangan gizi.',
                'suggestion' => 'Perawatan dirumah: Makanan bergizi tinggi dan mudah dicerna, Obati penyakit penyerta (misalnya diare), Terapi gizi rawat jalan atau rawat inap tergantung derajat keparahan'
            ],
            [
                'disease_code' => 'P05',
                'name_disease' => 'KEP (Kekurangan Energi Protein)',
                'information' => 'Kekurangan asupan energi dan protein jangka panjang, dapat berupa marasmus atau kwashiorkor.',
                'suggestion' => 'Perawatan dirumah: Gizi lengkap (karbohidrat, protein, lemak, vitamin, mineral), Monitoring status gizi, Edukasi keluarga tentang makanan bergizi.'
            ],
            [
                'disease_code' => 'P06',
                'name_disease' => 'Anemia Gizi Besi',
                'information' => 'Kondisi kekurangan zat besi yang menyebabkan turunnya kadar hemoglobin dalam darah.',
                'suggestion' => 'Perawatan dirumah: Suplemen zat besi dan vitamin C, Konsumsi makanan tinggi zat besi (daging, hati, sayuran hijau), Pencegahan cacingan (pemberian obat cacing).'
            ],
            [
                'disease_code' => 'P07',
                'name_disease' => 'Hipovitaminosis (Vitamin A, D, B1, B12)',
                'information' => 'Kekurangan satu atau lebih vitamin penting yang berdampak pada berbagai fungsi tubuh.',
                'suggestion' => 'Perawatan dirumah: Suplementasi sesuai kebutuhan, Makanan kaya vitamin: hati, ikan, susu, sayur, telur,Program suplementasi pemerintah (vitamin A setiap Februari & Agustus)'
            ],
            [
                'disease_code' => 'P08',
                'name_disease' => 'GAKY (Gangguan Akibat Kekurangan Yodium)',
                'information' => 'Gangguan pertumbuhan dan fungsi otak akibat kekurangan yodium.',
                'suggestion' => 'Perawatan dirumah: Konsumsi garam beryodium, Suplementasi yodium bila perlu, Edukasi ibu tentang pentingnya yodium dalam MP-ASI'
            ],
            [
                'disease_code' => 'P09',
                'name_disease' => 'Kekurangan Zinc',
                'information' => 'Zinc penting untuk sistem imun, pertumbuhan, dan penyembuhan luka.',
                'suggestion' => 'Perawatan dirumah: Suplemen zinc (terutama saat diare), Makanan kaya zinc: daging merah, hati, seafood, Perbaiki pola makan anak'
            ],
            [
                'disease_code' => 'P10',
                'name_disease' => 'Obesitas pada Anak',
                'information' => 'Kelebihan berat badan pada anak yang berisiko menyebabkan penyakit kronis.',
                'suggestion' => 'Perawatan dirumah: Atur pola makan: kurangi makanan manis, tinggi lemak, Tingkatkan aktivitas fisik, Edukasi keluarga tentang gizi seimbang, Konsultasi ke dokter gizi bila perlu.'
            ],
            [
                'disease_code' => 'P11',
                'name_disease' => 'Hipervitaminosis (Kelebihan Vitamin)',
                'information' => 'Kondisi kelebihan vitamin (terutama A dan D) akibat konsumsi suplemen berlebihan.',
                'suggestion' => 'Perawatan dirumah: Hentikan konsumsi suplemen berlebih, Evaluasi kadar vitamin dalam darah, Hanya konsumsi sesuai dosis anjuran'
            ],
        ];

        foreach ($diseases as $disease) {
            Disease::updateOrCreate(
                ['disease_code' => $disease['disease_code']],
                [
                    'name_disease' => $disease['name_disease'],
                    'information' => $disease['information'],
                    'suggestion' => $disease['suggestion'],
                ]
            );
        }
    
    }
}
