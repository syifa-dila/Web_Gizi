<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h1 class="text-xl font-bold mb-4">Hasil Diagnosis</h1>

        <div class="p-4 border rounded bg-gray-100">
            <p><strong>Kode Diagnosis:</strong> {{ $diagnosis->kode_diagnosis }}</p>
            <p><strong>Hasil:</strong> {{ $diagnosis->hasil_diagnosis }}</p>
            <p><strong>Rekomendasi:</strong> {{ $diagnosis->rekomendasi }}</p>
            <p><strong>Tanggal:</strong> {{ $diagnosis->tanggal }}</p>
        </div>
    </div>
</x-app-layout>
