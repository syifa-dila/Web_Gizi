<x-app-layout>
    <div class="max-w-5xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Kelola Penyakit</h1>

        {{-- Form Tambah Penyakit --}}
        <div class="mb-10">
            <form action="{{ route('penyakit.store') }}" method="POST"
                  class="bg-green-50 border border-green-100 p-6 rounded-xl shadow-sm space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="disease_code" placeholder="Kode Penyakit (mis. P-01)"
                           class="border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-green-300"
                           required>
                    <input type="text" name="name_disease" placeholder="Nama Penyakit"
                           class="border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-green-300"
                           required>
                </div>
                <textarea name="information" rows="3" placeholder="Informasi Penyakit"
                          class="border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-green-300 w-full"
                          required></textarea>
                <textarea name="suggestion" rows="3" placeholder="Saran Penanganan"
                          class="border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-green-300 w-full"
                          required></textarea>
                <div>
                    <x-primary-button class="w-full md:w-auto">
                        ➕ {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        {{-- Tabel Penyakit --}}
        <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-sm">
            <table class="min-w-full text-sm text-gray-800 bg-white">
                <thead class="bg-green-100 text-green-900 font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-left border-b">#</th>
                        <th class="px-4 py-3 text-left border-b">Kode</th>
                        <th class="px-4 py-3 text-left border-b">Nama Penyakit</th>
                        <th class="px-4 py-3 text-left border-b">Informasi</th>
                        <th class="px-4 py-3 text-left border-b">Saran</th>
                        <th class="px-4 py-3 text-center border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($diseases as $index => $disease)
                        <tr class="hover:bg-green-50">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-blue-700">{{ $disease->disease_code }}</td>
                            <td class="px-4 py-3">{{ $disease->name_disease }}</td>
                            <td class="px-4 py-3">{{ Str::limit($disease->information, 50) }}</td>
                            <td class="px-4 py-3">{{ Str::limit($disease->suggestion, 50) }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-3 items-center">
                                    <a href="{{ route('penyakit.edit', $disease->id) }}"
                                       class="text-blue-600 hover:underline font-medium">
                                        Edit
                                    </a>
                                    <x-danger-button
                                        x-data
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-disease-deletion-{{ $disease->id }}');
                                            $dispatch('set-action', '{{ route('penyakit.destroy', $disease->id) }}');">
                                        Hapus
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Konfirmasi Hapus --}}
                        <x-modal name="confirm-disease-deletion-{{ $disease->id }}" focusable maxWidth="xl">
                            <form action="{{ route('penyakit.destroy', $disease->id) }}" method="POST" class="p-6">
                                @csrf
                                @method('DELETE')
                                <h2 class="text-lg font-semibold text-gray-800">
                                    Apakah Anda yakin ingin menghapus penyakit ini?
                                </h2>
                                <p class="mt-2 text-sm text-gray-600">
                                    Data penyakit akan dihapus secara permanen dari sistem.
                                </p>
                                <div class="mt-6 flex justify-end gap-3">
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
                            <td colspan="6" class="text-center px-4 py-6 text-gray-500 italic">
                                Belum ada data penyakit.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
