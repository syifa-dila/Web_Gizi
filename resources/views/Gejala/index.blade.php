<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Kelola Gejala</h1>
        <div class="mb-6">
            <form action="{{ route('gejala.store') }}" method="POST" class="bg-gray-100 p-4 rounded shadow">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="code_symptom" placeholder="Kode Gejala (mis. GJ-01)" class="border p-2 rounded w-full" required>
                    <input type="text" name="name_symptom" placeholder="Nama Gejala" class="border p-2 rounded w-full" required>
                    <x-primary-button class="w-full md:w-auto">
                        {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="overflow-x-auto shadow rounded border">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-blue-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Kode</th>
                        <th class="px-4 py-2">Nama Gejala</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($gejalas as $index => $gejala)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $gejala->code_symptom }}</td>
                            <td class="px-4 py-2">{{ $gejala->name_symptom }}</td>
                            <td class="px-4 py-2">
                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('gejala.edit', $gejala->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <x-danger-button
                                        x-data
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-gejala-deletion-{{ $gejala->id }}');
                                            $dispatch('set-action', '{{ route('gejala.destroy', $gejala->id) }}');">
                                        {{ __('Hapus') }}
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>
                        <x-modal name="confirm-gejala-deletion-{{ $gejala->id }}" focusable maxWidth="xl">
                            <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST" class="p-6">
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
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data gejala</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
