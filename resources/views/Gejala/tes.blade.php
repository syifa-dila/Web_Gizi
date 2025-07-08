<x-app-layout>
    <div class="min-h-screen bg-white py-10 px-4">
        <h1 class="text-xl md:text-2xl font-bold text-center mb-2">Tes Diagnosis Kekurangan Gizi Pada Anak Balita</h1>
        <p class="text-sm text-center mb-6">Terdapat tiga Tabel yang harus Bunda isi untuk mengetahui Penyakit yang dialami sang buah hati</p>
  <div class="w-full max-w-3xl mx-auto rounded-md p-6">
            <div class="flex items-center mb-4">
                <div class="w-6 h-6 border border-black rounded-full flex items-center justify-center text-sm font-semibold mr-2">2</div>
                <p class="text-base font-semibold">Test Gejala</p>
            </div>
        <p class="text-sm mb-4">Tolong isi pertanyaan yang dialami oleh anak</p>
        </div>

        <div class="w-full max-w-3xl mx-auto bg-white border border-black rounded-md p-6 shadow-md">
            <form action="{{ route('gejala.save') }}" method="POST">
                @csrf

                @php
                    $pilihan = ['Yakin', 'Cukup Yakin', 'Sangat Yakin', 'Tidak Yakin'];
                @endphp
                <div class="mb-4">
                    <label class="block font-medium mb-1">1. Apakah anak terlihat lebih kurus dari anak yang seusianya?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ01" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">2. Apakah pipi anak terlihat lebih cekung?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ02" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                <div class="mb-4">
                    <label class="block font-medium mb-1">3. Apakah perut anak terlihat bucin tetapi bukan karena gemuk?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ03" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">4. Apakah tangan dan kaki anak tampak bengkak disertai demam?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ04" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">5. Apakah anak mengalami perubahan warna rambut? menjadi merah atau kusam?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ05" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">6. Apakah tinggi badan anak lebih pendek dari anak seusianya?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ06" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">7. Apakah mengalami penurunan berat badan yang begitu cepat?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ07" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">8. Apakah anak sering terlihat mudah lelah padahal tidak melakukan aktivitas?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ08" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">9. Apakah kulit, bibir atau kelopak mata anak nampak pucat?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ09" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">10. Apakah anak kesulitan melihat saat cahaya redup?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ10" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">11. Apakah anak mengalami mata kering? atau produksi air mata sedikit ketika menangis?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ11" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">12. Apakah ketika anak terluka lukanya sulit sembuh? atau sulit untuk kering?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ12" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">13. Apakah anak mengalami nafsu makan yang menurun?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ13" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">14. Apakah anak mengalami rentan infeksi dan mudah demam?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ14" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">15. Apakah anak mengalami penurunan aktivitas fisik? seperti tidak bermain?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ15" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">16. Apakah anak kesulitan fokus saat belajar ataupun bermain?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ16" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">17. Apakah anak sering mengantuk disiang hari?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ17" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">18. Apakah anak kesulitan bicara atau tidak merespon dengan baik saat diajak mengobrol?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ18" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">19. Apakah motorik anak terlambat seperti sulit untuk duduk, berdiri dan berjalan?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ19" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">20. Apakah anak mengalami rewel atau sering menangis tanpa sebab?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ20" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">21. Apakah anak mengalami tulang menonjol di bagian rusuk atau lengan?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ21" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">22. Apakah kulit anak terlihat tipis? atau mudah lecet dan memar?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ22" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">23. Apakah anak mengalami sering pusing atau memegang kepala terus menerus?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ23" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">24. Apakah anak mengalami berat badan yang tinggi atau obesitas?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ24" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">25. Apakah anak mengalami gangguan pencernaan seperti sembelit atau diare berkepanjangan?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ25" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">26. Apakah leher anak mengalami pembengkakan leher atau gondok?</label>
                    @foreach ($pilihan as $index => $label)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="GJ26" value="{{ $label }}" required>
                            <span class="ml-1">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-white border border-black px-4 py-2 rounded hover:bg-gray-100">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
