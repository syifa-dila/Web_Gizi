<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-green-100 border border-green-300 rounded-xl p-8 mb-10 text-center shadow">
                <h1 class="text-3xl sm:text-4xl font-bold text-green-800">Informasi Penyakit Gizi Buruk pada Anak</h1>
                <p class="mt-3 text-gray-700 text-sm sm:text-base">Berikut adalah penjelasan lengkap dari berbagai penyakit akibat gizi buruk yang umum terjadi pada anak-anak.</p>
            </div>

            @php
                $penyakit = [
                    [
                        'judul' => '1. Marasmus',
                        'isi' => '<strong>Marasmus</strong> adalah kekurangan energi-protein berat akibat asupan kalori dan protein rendah. Anak sangat kurus, kehilangan lemak tubuh, dan tampak tulangnya.',
                        'gejala' => 'Berat badan sangat rendah, otot mengecil, wajah tua, kulit keriput, lesu.',
                        'dampak' => 'Pertumbuhan terganggu, daya tahan tubuh menurun, risiko kematian tinggi.'
                    ],
                    [
                        'judul' => '2. Kwashiorkor',
                        'isi' => '<strong>Kwashiorkor</strong> terjadi karena kekurangan protein meski kalori cukup. Ditandai dengan pembengkakan tubuh.',
                        'gejala' => 'Edema (kaki, wajah), rambut kemerahan, kulit pecah, perut buncit.',
                        'dampak' => 'Imun lemah, pertumbuhan terganggu, kematian.'
                    ],
                    [
                        'judul' => '3. Stunting',
                        'isi' => '<strong>Stunting</strong> adalah gagal tumbuh akibat gizi buruk jangka panjang sejak kehamilan.',
                        'gejala' => 'Tinggi badan pendek, perkembangan tulang lambat.',
                        'dampak' => 'IQ rendah, produktivitas dewasa terganggu.'
                    ],
                    [
                        'judul' => '4. Wasting',
                        'isi' => '<strong>Wasting</strong> adalah malnutrisi akut dengan penurunan berat badan drastis.',
                        'gejala' => 'Sangat kurus, tidak aktif, dehidrasi.',
                        'dampak' => 'Kematian tinggi, gangguan organ vital.'
                    ],
                    [
                        'judul' => '5. Kekurangan Energi Protein (KEP)',
                        'isi' => '<strong>KEP</strong> mencakup Marasmus dan Kwashiorkor, akibat kurang makan dan protein.',
                        'gejala' => 'Kurus, rambut tipis, lesu.',
                        'dampak' => 'Imun lemah, otak lambat berkembang.'
                    ],
                    [
                        'judul' => '6. Anemia Gizi Besi',
                        'isi' => '<strong>Anemia Gizi Besi</strong> disebabkan kekurangan zat besi yang dibutuhkan untuk hemoglobin.',
                        'gejala' => 'Pucat, lelah, pusing, sulit konsentrasi.',
                        'dampak' => 'Prestasi belajar menurun, infeksi meningkat.'
                    ],
                    [
                        'judul' => '7. Hipovitaminosis',
                        'isi' => '<strong>Hipovitaminosis</strong> adalah kekurangan vitamin penting seperti A, D, B1, B12.',
                        'gejala' => '<ul class="list-disc ml-5 mt-2">
                            <li><strong>Vit A:</strong> Rabun senja, mata kering.</li>
                            <li><strong>Vit D:</strong> Rakitis, nyeri tulang.</li>
                            <li><strong>Vit B1:</strong> Beri-beri.</li>
                            <li><strong>Vit B12:</strong> Anemia, kesemutan.</li>
                        </ul>',
                        'dampak' => 'Kebutaan, gangguan saraf dan tulang.'
                    ],
                    [
                        'judul' => '8. GAKY',
                        'isi' => '<strong>GAKY</strong> (Gangguan Akibat Kekurangan Yodium) memengaruhi hormon tiroid.',
                        'gejala' => 'Gondok, bicara lambat, IQ rendah.',
                        'dampak' => 'Keterbelakangan mental dan fisik.'
                    ],
                    [
                        'judul' => '9. Kekurangan Zinc',
                        'isi' => '<strong>Kekurangan Zinc</strong> mengganggu pertumbuhan, penyembuhan, dan imun.',
                        'gejala' => 'Diare, luka lama sembuh, rambut rontok.',
                        'dampak' => 'Infeksi tinggi, pertumbuhan terganggu.'
                    ],
                    [
                        'judul' => '10. Obesitas Anak',
                        'isi' => '<strong>Obesitas Anak</strong> akibat pola makan tinggi kalori dan kurang aktivitas.',
                        'gejala' => 'Perut besar, lemas, lipatan kulit iritasi.',
                        'dampak' => 'Diabetes, hipertensi, rendah diri.'
                    ],
                    [
                        'judul' => '11. Hipervitaminosis',
                        'isi' => '<strong>Hipervitaminosis</strong> adalah kelebihan vitamin, terutama yang larut lemak.',
                        'gejala' => 'Mual, nyeri otot, mudah marah.',
                        'dampak' => 'Kerusakan organ, gangguan saraf.'
                    ]
                ];
            @endphp

            @foreach ($penyakit as $p)
                <div class="bg-white rounded-xl shadow-md p-6 mb-8 border border-gray-200">
                    <h2 class="text-xl sm:text-2xl font-semibold text-green-700 mb-2">{{ $p['judul'] }}</h2>
                    <div class="text-gray-700 text-justify text-sm sm:text-base">
                        {!! $p['isi'] !!}
                        <br><br>
                        <strong>Gejala:</strong> {!! $p['gejala'] !!}
                        <br><br>
                        <strong>Dampak:</strong> {!! $p['dampak'] !!}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
