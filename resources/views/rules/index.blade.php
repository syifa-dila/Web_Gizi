<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Kelola Nilai CF</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('rules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Aturan CF</a>

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Penyakit</th>
                    <th class="border px-4 py-2">Gejala</th>
                    <th class="border px-4 py-2">CF User</th>
                    <th class="border px-4 py-2">CF Pakar</th>
                    <th class="border px-4 py-2">Combine</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rules as $rule)
                    <tr>
                        <td class="border px-4 py-2">{{ $rule->disease->name }}</td>
                        <td class="border px-4 py-2">{{ $rule->gejala->name }}</td>
                        <td class="border px-4 py-2">{{ $rule->CF_user }}</td>
                        <td class="border px-4 py-2">{{ $rule->CF_pakar }}</td>
                        <td class="border px-4 py-2">{{ $rule->combine }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('rules.edit', $rule->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                            <form action="{{ route('rules.destroy', $rule->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
