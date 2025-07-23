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
                            <div class="flex gap-3 items-center">
                                <a href="{{ route('rules.edit', $rule->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <x-danger-button
                                        x-data
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-rule-deletion-{{ $rule->id }}');
                                            $dispatch('set-action', '{{ route('rules.destroy', $rule->id) }}');">
                                        {{ __('Hapus') }}
                                </x-danger-button>
                                </div>
                            </td>
                        </tr>
                        <x-modal name="confirm-rule-deletion-{{ $rule->id }}" focusable maxWidth="xl">
                            <form action="{{ route('rules.destroy', $rule->id) }}" method="POST" class="p-6">
                                @csrf
                                @method('DELETE')
                                <h2 class="text-lg font-medium text-black dark:text-black">
                                    {{ __('Apakah anda yakin akan menghapus Gejala ini?') }}
                                </h2>
                                <p class="mt-2 text-sm text-black dark:text-black">
                                    {{ __('Setelah proses dilaksanakan, gejala akan dihapus permanen dari sistem.') }}
                                </p>
                                <div class="mt-6 flex justify-end space-x-3">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Batal') }}
                                    </x-secondary-button>
                                    <x-danger-button type="submit">
                                        {{ __('Hapus') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>   
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
