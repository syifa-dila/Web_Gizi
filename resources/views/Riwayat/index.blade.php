<x-app-layout>
    <div class="max-w-6xl mx-auto mt-14 py-10 px-6">
        <h2 class="text-2xl md:text-3xl font-semibold text-center text-gray-800 mb-8">
            Riwayat Diagnosis Anak
        </h2>

        {{-- Filter Tanggal --}}
        <form method="GET" class="mb-8 bg-white border border-gray-200 rounded-lg p-4 md:p-6 flex flex-col md:flex-row gap-4 justify-center items-end">
            <div class="flex flex-col">
                <label class="text-sm text-gray-600 mb-1">Tanggal Awal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                    class="border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            <div class="flex flex-col">
                <label class="text-sm text-gray-600 mb-1">Tanggal Akhir</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                    class="border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-1.5 rounded shadow-sm transition">
                Filter
            </button>
        </form>

        {{-- Tabel Riwayat --}}
        <div class="bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-gray-800">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-5 py-3 text-left">Tanggal</th>
                        <th class="px-5 py-3 text-left">Penyakit</th>
                        <th class="px-5 py-3 text-left">Tingkat Keyakinan</th>
                        <th class="px-5 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $item)
                        <tr class="border-t hover:bg-gray-50 transition-colors">
                            <td class="px-5 py-3">{{ $item->date->format('d M Y') }}</td>
                            <td class="px-5 py-3">{{ $item->disease->name_disease ?? '-' }}</td>
                            <td class="px-5 py-3">{{ number_format($item->result, 1) }}%</td>
                            <td class="px-5 py-3">
                                <a href="{{ route('diagnosis.hasil', $item->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">
                                Tidak ada data diagnosis yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
