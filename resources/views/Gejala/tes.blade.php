<x-app-layout>
    <div class="min-h-screen bg-white py-10 px-4">
        <h1 class="text-xl md:text-2xl font-bold text-center mb-2">Tes Diagnosis Kekurangan Gizi Pada Anak Balita</h1>
        <p class="text-sm text-center mb-6">Silakan isi gejala yang dialami sang buah hati berdasarkan observasi Bunda</p>

        <div class="w-full max-w-3xl mx-auto bg-white border border-black rounded-md p-6 shadow-md">
            <form action="{{ route('gejala.save') }}" method="POST">
                @csrf

                {{-- Tampilkan semua pertanyaan gejala secara dinamis --}}
                @foreach ($gejalas as $index => $gejala)
                    <div class="mb-4">
                        <label class="block font-medium mb-1">
                            {{ $index + 1 }}. {{ $gejala->name_symptom }}
                        </label>
                        @foreach ($pilihan as $label)
                            <label class="inline-flex items-center mr-4 mb-2">
                                <input type="radio" name="{{ $gejala->code_symptom }}" value="{{ $label }}" required>
                                <span class="ml-1">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                @endforeach

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-white border border-black px-4 py-2 rounded hover:bg-gray-100">
                        Selanjutnya
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
