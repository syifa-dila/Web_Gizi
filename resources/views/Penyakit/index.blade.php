<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Kelola Penyakit</h1>

        <!-- Form Tambah Penyakit -->
        <div class="mb-6">
            <form action="{{ route('disease.store') }}" method="POST" class="bg-gray-100 p-4 rounded shadow space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="disease_code" placeholder="Kode Penyakit (mis. GZ-01)" class="border p-2 rounded w-full" required>
                    <input type="text" name="name_disease" placeholder="Nama Penyakit" class="border p-2 rounded w-full" required>
                </div>
                <textarea name="information" rows="3" placeholder="Informasi Penyakit" class="border p-2 rounded w-full" required></textarea>
                <textarea name="suggestion" rows="3" placeholder="Saran Penanganan" class="border p-2 rounded w-full" required></textarea>
                <div>
                    <x-primary-button class="w-full md:w-auto">
                        {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <!-- Tabel Data Penyakit -->
        <div class="overflow-x-auto shadow rounded border">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-blue-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Kode</th>
                        <th class="px-4 py-2">Nama Penyakit</th>
                        <th class="px-4 py-2">Informasi</th>
                        <th class="px-4 py-2">Saran</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($diseases as $index => $disease)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $disease->disease_code }}</td>
                            <td class="px-4 py-2">{{ $disease->name_disease }}</td>
                            <td class="px-4 py-2">{{ Str::limit($disease->information, 40) }}</td>
                            <td class="px-4 py-2">{{ Str::limit($disease->suggestion, 40) }}</td>
                            <td class="px-4 py-2">
                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('disease.edit', $disease->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <x-danger-button
                                        x-data
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-disease-deletion-{{ $disease->id }}');
                                            $dispatch('set-action', '{{ route('disease.destroy', $disease->id) }}');">
                                        {{ __('Hapus') }}
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <x-modal name="confirm-disease-deletion-{{ $disease->id }}" focusable maxWidth="xl">
                            <form action="{{ route('disease.destroy', $disease->id) }}" method="POST" class="p-6">
                                @csrf
                                @method('DELETE')
                                <h2 class="text-lg font-medium text-black">
                                    {{ __('Apakah anda yakin akan menghapus Penyakit ini?') }}
                                </h2>
                                <p class="mt-2 text-sm text-black">
                                    {{ __('Setelah proses dilaksanakan, data penyakit akan dihapus permanen dari sistem.') }}
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
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data penyakit</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
