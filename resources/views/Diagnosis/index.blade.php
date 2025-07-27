<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Riwayat Diagnosis Pasien</h1>

        {{-- Filter Tanggal --}}
        <form method="GET" action="{{ route('diagnosis.index') }}" class="mb-6 flex flex-wrap items-center justify-center gap-3 bg-green-50 p-4 rounded-xl shadow border border-green-100">
            <label for="date" class="text-sm font-medium text-gray-700">Filter Tanggal Diagnosis:</label>
            <input type="date" name="date" id="date"
                   class="border border-gray-300 px-3 py-2 rounded-md text-sm shadow-sm focus:ring-2 focus:ring-green-300"
                   value="{{ request('date') }}">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                Filter
            </button>
            <a href="{{ route('diagnosis.index') }}"
               class="text-sm text-green-700 underline hover:text-green-800 transition">
                Reset
            </a>
        </form>

        @if($diagnoses->count())
            <div class="overflow-x-auto shadow rounded-lg border border-gray-200">
                <table class="min-w-full text-sm text-gray-800">
                    <thead class="bg-green-100 text-green-800">
                        <tr>
                            <th class="p-3 text-left border-b">Tgl Lahir</th>
                            <th class="p-3 text-left border-b">Nama Anak</th>
                            <th class="p-3 text-left border-b">Nama Ibu</th>
                            <th class="p-3 text-left border-b">Nama Ayah</th>
                            <th class="p-3 text-left border-b">Penyakit</th>
                            <th class="p-3 text-left border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($diagnoses as $diagnosis)
                            <tr class="hover:bg-green-50 border-b">
                                <td class="p-3">{{ \Carbon\Carbon::parse($diagnosis->pasien->birth_date)->translatedFormat('d F Y') }}</td>
                                <td class="p-3">{{ $diagnosis->pasien->name ?? '-' }}</td>
                                <td class="p-3">{{ $diagnosis->pasien->motherName ?? '-' }}</td>
                                <td class="p-3">{{ $diagnosis->pasien->fatherName ?? '-' }}</td>
                                <td class="p-3 font-semibold text-red-600">{{ $diagnosis->disease->name_disease ?? '-' }}</td>
                                <td class="p-3 text-center">
                                    <a href="{{ route('diagnosis.hasil', $diagnosis->id) }}"
                                       class="inline-block bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded mr-1 transition">
                                        Lihat
                                    </a>
                                    <form action="{{ route('diagnosis.destroy', $diagnosis->id) }}"
                                          method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus diagnosis ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center text-gray-600 mt-6">
                <p class="text-lg">Belum ada data diagnosis yang tersedia.</p>
            </div>
        @endif
    </div>
</x-app-layout>
