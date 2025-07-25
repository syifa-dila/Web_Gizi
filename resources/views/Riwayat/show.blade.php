<x-app-layout>
    <div class="max-w-4xl mx-auto py-10">
        <h2 class="text-xl font-bold mb-6">Detail Diagnosis</h2>

        <p><strong>Tanggal Diagnosis:</strong> {{ $diagnosis->date->format('d M Y') }}</p>
        <p><strong>Penyakit:</strong> {{ $diagnosis->disease->name_disease }}</p>
        <p><strong>Tingkat Keyakinan:</strong> {{ number_format($diagnosis->result, 1) }}%</p>
    </div>
</x-app-layout>
