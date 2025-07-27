<x-app-layout>
    <div class="min-h-screen bg-green-50 py-10 px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl md:text-3xl font-bold text-center text-green-700 mb-2">
                Tes Diagnosis Kekurangan Gizi Pada Anak Balita
            </h1>
            <p class="text-center text-sm text-gray-700 mb-6">
                Bunda, silakan jawab pertanyaan berikut untuk mengetahui kemungkinan gangguan gizi yang dialami anak.
            </p>

            <div class="bg-white border-l-4 border-green-500 shadow-md rounded-lg p-4 mb-6">
                <div class="flex items-center mb-2">
                    <div class="w-6 h-6 bg-green-600 text-white flex items-center justify-center rounded-full font-bold text-sm mr-2">2</div>
                    <h2 class="text-base font-semibold text-green-800">Langkah 2: Pemeriksaan Gejala</h2>
                </div>
                <p class="text-sm text-gray-600">Silakan pilih tingkat keyakinan terhadap gejala yang dialami anak.</p>
            </div>

            <form action="{{ route('resultcf.store') }}" method="POST" class="bg-white border border-green-200 rounded-lg p-6 shadow-sm">
                @csrf
                <input type="hidden" name="pasiens_id" value="{{ $pasiens->id }}">

                @php
                    $pilihan = [
                        'Sangat Yakin' => 1.0,
                        'Yakin' => 0.8,
                        'Cukup Yakin' => 0.6,
                        'Kurang Yakin' => 0.4,
                        'Tidak Yakin' => 0.2,
                        'Tidak' => 0.0
                    ];
                @endphp

                @foreach ($gejalas as $gejala)
                    <div class="mb-6">
                        <p class="font-medium text-gray-800 mb-2">({{ $loop->iteration }}) {{ $gejala->name_symptom }}</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach ($pilihan as $label => $nilai)
                                <label class="flex items-center p-2 bg-green-100 rounded-md hover:bg-green-200 cursor-pointer transition">
                                    <input type="radio"
                                           name="gejala[{{ $gejala->id }}]"
                                           value="{{ $nilai }}"
                                           class="accent-green-600 mr-2"
                                           required>
                                    <span class="text-sm text-gray-700">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-8">
                    <button type="submit"
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                        Lakukan Diagnosis
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
