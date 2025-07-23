<x-app-layout>
    <div class="min-h-screen bg-white py-10 px-4">
        <h1 class="text-xl md:text-2xl font-bold text-center mb-2">
            Tes Diagnosis Kekurangan Gizi Pada Anak Balita
        </h1>
        <p class="text-sm text-center mb-6">
            Terdapat tiga Tabel yang harus Bunda isi untuk mengetahui Penyakit yang dialami sang buah hati
        </p>

        <div class="w-full max-w-3xl mx-auto rounded-md p-6">
            <div class="flex items-center mb-4">
                <div class="w-6 h-6 border border-black rounded-full flex items-center justify-center text-sm font-semibold mr-2">2</div>
                <p class="text-base font-semibold">Test Gejala</p>
            </div>
            <p class="text-sm mb-4">
                Tolong isi pertanyaan yang dialami oleh anak
            </p>
        </div>

        <div class="w-full max-w-3xl mx-auto bg-white border border-black rounded-md p-6 shadow-md">
            <form action="{{ route('resultcf.store') }}" method="POST">
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
                        <p class="font-semibold mb-2">({{ $loop->iteration }}) {{ $gejala->name_symptom }}</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach ($pilihan as $label => $nilai)
                                <label class="flex items-center space-x-2">
                                    <input type="radio"
                                           name="gejala[{{ $gejala->id }}]"
                                           value="{{ $nilai }}"
                                           class="rounded-full border-gray-300 text-blue-600 focus:ring-blue-500"
                                           required>
                                    <span class="text-sm">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-6">
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
