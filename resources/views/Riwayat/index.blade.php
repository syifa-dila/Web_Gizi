<x-app-layout>
    <div class="max-w-6xl mx-auto mt-14 py-10 px-6">
        <h2 class="text-3xl font-bold text-center text-green-700 mb-8">
            Riwayat Diagnosis Saya
        </h2>

        {{-- Filter Tanggal --}}
        <form method="GET" class="mb-10 bg-green-50 border border-green-200 rounded-xl p-6 flex flex-col md:flex-row gap-4 justify-center items-end shadow-sm">
            <div class="flex flex-col">
                <label class="text-sm text-gray-700 font-medium mb-1">Waktu Diagnosis</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                    class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 shadow-sm">
            </div>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow transition">
                Filter
            </button>
        </form>

        {{-- Tabel Riwayat --}}
        <div class="bg-white border border-gray-200 shadow-md rounded-xl overflow-hidden">
            <table class="min-w-full text-sm text-gray-800">
                <thead class="bg-green-100 text-green-800 text-sm uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-left">Penyakit</th>
                        <th class="px-6 py-3 text-left">Tingkat Keyakinan</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $item)
                        <tr class="border-t hover:bg-green-50 transition">
                            <td class="px-6 py-3">{{ $item->date->format('d M Y') }}</td>
                            <td class="px-6 py-3">{{ $item->disease->name_disease ?? '-' }}</td>
                            <td class="px-6 py-3">{{ number_format($item->result, 1) }}%</td>
                            <td class="px-6 py-3">
                                <a href="{{ route('diagnosis.hasil', $item->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-4 py-1.5 rounded-md shadow">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-gray-500 italic">
                                Belum ada riwayat diagnosis ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
