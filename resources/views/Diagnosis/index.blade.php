<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Riwayat Diagnosis Pasien</h1>

        {{-- Filter tanggal --}}
        <form method="GET" action="{{ route('diagnosis.index') }}" class="mb-4 flex items-center gap-2">
            <label for="date" class="text-sm">Filter Tanggal Diagnosis:</label>
            <input type="date" name="date" id="date" class="border px-2 py-1 rounded" value="{{ request('date') }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 text-sm rounded">
                Filter
            </button>
            <a href="{{ route('diagnosis.index') }}" class="text-sm text-gray-700 underline">Reset</a>
        </form>

        @if($diagnoses->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 text-sm">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="p-2 border">Tanggal Lahir</th>
                            <th class="p-2 border">Pasien</th>
                            <th class="p-2 border">Nama Ibu</th>
                            <th class="p-2 border">Nama Ayah</th>
                            <th class="p-2 border">Penyakit</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnoses as $diagnosis)
                            <tr class="border-t">
                                <td class="p-2 border">{{ \Carbon\Carbon::parse($diagnosis->pasien->birth_date)->format('d F Y') }}</td>
                                <td class="p-2 border">{{ $diagnosis->pasien->name ?? '-' }}</td>
                                <td class="p-2 border">{{ $diagnosis->pasien->motherName ?? '-' }}</td>
                                <td class="p-2 border">{{ $diagnosis->pasien->fatherName ?? '-' }}</td>
                                <td class="p-2 border">{{ $diagnosis->disease->name_disease ?? '-' }}</td>
                                <td class="p-2 border">
                                    <a href="{{ route('diagnosis.hasil', $diagnosis->id) }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white text-xs font-semibold px-3 py-1 rounded mr-1">
                                        Lihat
                                    </a>

                                    {{-- Form Hapus --}}
                                    <form action="{{ route('diagnosis.destroy', $diagnosis->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus diagnosis ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded">
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
            <p class="text-center text-gray-600">Belum ada data diagnosis.</p>
        @endif
    </div>
</x-app-layout>
