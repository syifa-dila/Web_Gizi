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
            <form action="{{ route('diagnoses.hasil') }}" method="POST">
                @csrf
                @foreach ($gejalas as $gejala)
                    <div class="mb-4">
                        <label class="font-medium block mb-1">
                            {{ $loop->iteration }}. {{ $gejala->name_symptom }}
                        </label>
                        @foreach ($pilihan as $label => $value)
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" name="jawaban[{{ $gejala->id }}]" value="{{ $value }}" required>
                                <span class="ml-1">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Proses Diagnosa
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
