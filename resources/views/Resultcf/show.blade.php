<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Hasil Keyakinan CF - Pasien ID: ') . $pasiens_id }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 font-medium text-gray-600">Gejala</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Nilai CF</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($hasil_cf as $row)
                                <tr>
                                    <td class="px-4 py-2 text-gray-800">{{ $row->gejala }}</td>
                                    <td class="px-4 py-2 text-gray-800">{{ number_format($row->nilai_cf, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-2 text-center text-gray-500">Tidak ada data yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tombol Navigasi --}}
            <div class="mt-6 flex space-x-4">
                <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Kembali ke Dashboard
                </a>
                <a href="{{ route('combination.process', $pasiens_id) }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Lanjut ke Proses Kombinasi CF
                </a>
            </div>

        </div>
    </div>
</x-app-layout> -->
