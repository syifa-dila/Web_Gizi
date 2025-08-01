<x-app-layout>
    <div class="max-w-5xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Kelola Gejala</h1>

        {{-- Form Tambah Gejala --}}
        <div class="mb-8">
            <form action="{{ route('gejala.store') }}" method="POST"
                  class="bg-green-50 border border-green-100 p-6 rounded-xl shadow-sm">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="code_symptom" placeholder="Kode Gejala (mis. GJ-01)"
                           class="border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-green-300"
                           required>
                    <input type="text" name="name_symptom" placeholder="Nama Gejala"
                           class="border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-green-300"
                           required>
                    <x-primary-button class="w-full md:w-auto">
                        ➕ {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        {{-- Tabel Gejala --}}
        <div class="overflow-x-auto border border-gray-200 rounded-xl shadow">
            <table class="min-w-full text-sm text-gray-800 bg-white">
                <thead class="bg-green-100 text-green-900">
                    <tr>
                        <th class="px-4 py-3 text-left border-b">#</th>
                        <th class="px-4 py-3 text-left border-b">Kode</th>
                        <th class="px-4 py-3 text-left border-b">Nama Gejala</th>
                        <th class="px-4 py-3 text-left border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($gejalas as $index => $gejala)
                        <tr class="hover:bg-green-50">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-blue-700">{{ $gejala->code_symptom }}</td>
                            <td class="px-4 py-3">{{ $gejala->name_symptom }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-3 items-center">
                                    <a href="{{ route('gejala.edit', $gejala->id) }}"
                                       class="text-blue-600 hover:underline font-medium">
                                        Edit
                                    </a>
                                    <x-danger-button
                                        x-data
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-gejala-deletion-{{ $gejala->id }}');
                                            $dispatch('set-action', '{{ route('gejala.destroy', $gejala->id) }}');">
                                        Hapus
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Konfirmasi Hapus --}}
                        <x-modal name="confirm-gejala-deletion-{{ $gejala->id }}" focusable maxWidth="xl">
                            <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST" class="p-6">
                                @csrf
                                @method('DELETE')
                                <h2 class="text-lg font-semibold text-gray-800">
                                    Apakah Anda yakin ingin menghapus gejala ini?
                                </h2>
                                <p class="mt-2 text-sm text-gray-600">
                                    Data gejala akan dihapus secara permanen dari sistem.
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
                            <td colspan="4" class="text-center px-4 py-6 text-gray-500 italic">
                                Belum ada data gejala.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
