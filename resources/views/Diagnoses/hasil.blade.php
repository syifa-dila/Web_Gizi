<x-app-layout>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-xl md:text-2xl font-bold text-center mb-4">
            Hasil Diagnosis Kekurangan Gizi
        </h1>

        @if ($diagnoses)
            <div class="border border-black rounded-md p-6 bg-gray-100">
                <div class="mb-3">
                    <p class="text-sm"><strong>Kode Diagnosis:</strong> {{ $diagnoses->code_diagnosis }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-sm"><strong>Hasil:</strong> {{ $diagnoses->result_diagnosis }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-sm"><strong>Rekomendasi:</strong> {{ $diagnoses->rekomendasi }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-sm"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($diagnoses->date)->format('d-m-Y') }}</p>
                </div>
            </div>
        @else
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-center">
                Data diagnosis tidak ditemukan.
            </div>
        @endif
    </div>
</x-app-layout>
