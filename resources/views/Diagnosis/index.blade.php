<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Riwayat Diagnosis Gizi</h1>

        @if($diagnoses->count())
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2 border">Kode</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Nama Pasien</th>
                        <th class="px-4 py-2 border">Hasil Diagnosis</th>
                        <th class="px-4 py-2 border">Penyakit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diagnoses as $diagnosis)
                        <tr>
                            <td class="px-4 py-2 border">{{ $diagnosis->code_diagnosis }}</td>
                            <td class="px-4 py-2 border">{{ $diagnosis->date }}</td>
                            <td class="px-4 py-2 border">{{ $diagnosis->pasien->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $diagnosis->result_diagnosis }}</td>
                            <td class="px-4 py-2 border">{{ $diagnosis->disease->name_disease ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-600">Belum ada data diagnosis.</p>
        @endif
    </div>
</x-app-layout>
