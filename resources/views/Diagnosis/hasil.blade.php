<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow-md rounded-xl">
        <h2 class="text-2xl font-bold text-center mb-4">Tes Diagnosis Kekurangan Gizi Pada Anak Balita</h2>
        <p class="text-center text-gray-600 mb-6">Berikut merupakan hasil diagnosis</p>

        <div class="border p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4 text-center text-indigo-700">Hasil Diagnosis Kekurangan Gizi Pada Anak Balita</h3>

            {{-- Informasi Pasien --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <p><strong>Nama Anak:</strong> {{ $pasien->name }}</p>
                    <p><strong>Nama Ibu:</strong> {{ $pasien->motherName }}</p>
                    <p><strong>Nama Ayah:</strong> {{ $pasien->fatherName }}</p>
                </div>
                <div>
                    <p><strong>Tanggal Diagnosis:</strong>
                        {{ \Carbon\Carbon::parse($diagnosis->date)->format('d-m-Y') }}
                    </p>
                    <p><strong>Puskesmas:</strong> Puskesmas Kademangan</p>
                </div>
            </div>

            {{-- Hasil Utama --}}
            <div class="mb-6">
                <p class="font-bold text-lg">Hasil Diagnosis Utama:</p>
                <div class="mt-2 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
                    {{ $diagnosis->result }}% ({{ $diagnosis->tingkatKeyakinan() }}) terhadap
                    <strong>Penyakit {{ $disease->name_disease }}</strong>
                </div>
            </div>

            {{-- Kemungkinan Penyakit Lain --}}
            @php
                $otherDiseases = $allResults->filter(function ($res) use ($disease) {
                    return $res['disease']->id !== $disease->id && $res['cf_combine'] > 0;
                });
            @endphp

            @if($otherDiseases->count() > 0)
                <div class="mt-8">
                    <h4 class="text-lg font-semibold mb-2 text-center text-gray-700">Kemungkinan Penyakit Lain</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="p-2 text-left">Penyakit</th>
                                    <th class="p-2 text-left">Persentase Keyakinan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($otherDiseases as $res)
                                    <tr class="border-t">
                                        <td class="p-2">{{ $res['disease']->name_disease }}</td>
                                        <td class="p-2">{{ $res['cf_combine'] }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- Informasi Penyakit --}}
            <div class="mb-6 mt-6">
                <p class="font-bold text-lg">Informasi Penyakit:</p>
                <p class="mt-2 text-gray-700">{{ $disease->information ?? 'Belum ada informasi.' }}</p>
            </div>

            {{-- Saran --}}
<div class="mb-6">
    <p class="font-bold text-lg">Saran:</p>

    @php
        $saran = $disease->suggestion ?? 'Belum ada saran.';
        $listSaran = preg_split('/-\s*/', $saran, -1, PREG_SPLIT_NO_EMPTY);
    @endphp

    @if(count($listSaran))
        <ul class="mt-2 text-gray-700 list-disc pl-6 space-y-1">
            @foreach($listSaran as $item)
                <li>{{ trim($item) }}</li>
            @endforeach
        </ul>
    @else
        <p class="mt-2 text-gray-700">Belum ada saran.</p>
    @endif
</div>

        </div>
    </div>
</x-app-layout>
