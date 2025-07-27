<!-- <x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold mb-6">
            Hasil Diagnosis untuk <span class="text-blue-600">{{ $pasien->name }}</span>
        </h2>

        <h3 class="text-lg font-semibold mb-4">Detail Perhitungan Certainty Factor (CF)</h3>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="border border-gray-300 px-4 py-2">Gejala</th>
                        <th class="border border-gray-300 px-4 py-2">Penyakit</th>
                        <th class="border border-gray-300 px-4 py-2">CF User</th>
                        <th class="border border-gray-300 px-4 py-2">CF Pakar</th>
                        <th class="border border-gray-300 px-4 py-2">CF Kombinasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($combinations_raw as $comb)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $comb->result_cf->gejala->code_symptom ?? '-' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $comb->rules->disease->name_disease ?? '-' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ number_format($comb->result_cf->nilai_cf ?? 0, 1) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ number_format($comb->rules->cf_pakar ?? 0, 1) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ number_format($comb->cf_value ?? 0, 1) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-4 text-gray-500">
                                Tidak ada data kombinasi ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6 text-center">
    <a href="{{ route('diagnosis.proses', ['pasiens_id' => $pasien->id]) }}"
       class="inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
        Proses Diagnosis
    </a>
</div>

    </div>
</x-app-layout> -->
