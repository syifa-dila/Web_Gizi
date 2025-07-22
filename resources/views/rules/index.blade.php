<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Kelola Aturan Nilai Certainty Factor</h2>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah --}}
        <div class="mb-4">
            <a href="{{ route('rules.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>
        </div>

        {{-- Tabel Data CF --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 text-sm text-black">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Kode Penyakit</th>
                        <th class="border px-4 py-2">Kode Gejala</th>
                        <th class="border px-4 py-2">Nilai Certainty Factor Pakar</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rules as $index => $rule)
                        <tr>
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $rule->disease->disease_code}}</td>
                            <td class="border px-4 py-2">{{ $rule->gejala->code_symptom}}</td>
                            <td class="border px-4 py-2">{{ $rule->cf_pakar }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <a href="{{ route('rules.edit', $rule->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('rules.destroy', $rule->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-4 text-gray-500">Data aturan CF belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
