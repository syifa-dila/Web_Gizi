<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h2 class="text-xl font-bold mb-6 text-center">Hasil Diagnosa</h2>

        @if (!empty($hasilDiagnosa))
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">Penyakit</th>
                        <th class="border px-4 py-2">Nilai CF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilDiagnosa as $hasil)
                        <tr>
                            <td class="border px-4 py-2">{{ $hasil['penyakit'] }}</td>
                            <td class="border px-4 py-2">{{ $hasil['cf'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-red-600">Tidak ada hasil diagnosa yang ditemukan.</p>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Kembali ke Beranda</a>
        </div>
    </div>
</x-app-layout>
