<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-green-700">Kelola Aturan Certainty Factor</h2>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah --}}
        <div class="mb-6 text-right">
            <a href="{{ route('rules.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow transition duration-200">
                ➕ Tambah Aturan
            </a>
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto rounded-xl shadow border border-gray-200 bg-white">
            <table class="w-full table-auto text-sm md:text-base text-gray-800">
                <thead class="bg-green-100 text-green-900">
                    <tr class="text-left">
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Kode Penyakit</th>
                        <th class="px-4 py-3 border">Kode Gejala</th>
                        <th class="px-4 py-3 border">Nilai CF Pakar</th>
                        <th class="px-4 py-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($rules as $index => $rule)
                        <tr class="hover:bg-green-50">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $rule->disease->disease_code }}</td>
                            <td class="px-4 py-2">{{ $rule->gejala->code_symptom }}</td>
                            <td class="px-4 py-2 font-semibold">{{ $rule->cf_pakar }}</td>
                            <td class="px-4 py-2">
                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('rules.edit', $rule->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">
                                        Edit
                                    </a>

                                    <x-danger-button
                                        x-data
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-rule-deletion-{{ $rule->id }}');
                                            $dispatch('set-action', '{{ route('rules.destroy', $rule->id) }}');">
                                        Hapus
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal konfirmasi hapus --}}
                        <x-modal name="confirm-rule-deletion-{{ $rule->id }}" focusable maxWidth="xl">
                            <form method="POST" action="{{ route('rules.destroy', $rule->id) }}" class="p-6">
                                @csrf
                                @method('DELETE')
                                <h2 class="text-lg font-semibold text-gray-800 mb-2">Yakin ingin menghapus aturan ini?</h2>
                                <p class="text-sm text-gray-600 mb-4">Data akan dihapus permanen dan tidak dapat dikembalikan.</p>
                                <div class="flex justify-end space-x-4">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        Batal
                                    </x-secondary-button>
                                    <x-danger-button type="submit">
                                        Hapus
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada data aturan CF.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
