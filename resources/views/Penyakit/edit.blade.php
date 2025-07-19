<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Penyakit</h1>

        <div class="mb-6">
            <form action="{{ route('penyakit.update', $disease->id) }}" method="POST" class="bg-gray-100 p-4 rounded shadow space-y-4">
                @csrf
                @method('PUT')

                <!-- Kode dan Nama Penyakit -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="disease_code" class="block font-semibold mb-1">Kode Penyakit</label>
                        <input type="text" id="disease_code" name="disease_code" value="{{ old('disease_code', $disease->disease_code) }}" placeholder="Contoh: P01" class="border p-2 rounded w-full" required>
                    </div>
                    <div>
                        <label for="name_disease" class="block font-semibold mb-1">Nama Penyakit</label>
                        <input type="text" id="name_disease" name="name_disease" value="{{ old('name_disease', $disease->name_disease) }}" placeholder="Contoh: Marasmus" class="border p-2 rounded w-full" required>
                    </div>
                </div>

                <!-- Informasi Penyakit -->
                <div>
                    <label for="information" class="block font-semibold mb-1">Informasi Penyakit</label>
                    <textarea id="information" name="information" rows="3" placeholder="Deskripsi singkat mengenai penyakit ini" class="border p-2 rounded w-full" required>{{ old('information', $disease->information) }}</textarea>
                </div>

                <!-- Saran Penanganan -->
                <div>
                    <label for="suggestion" class="block font-semibold mb-1">Saran Penanganan</label>
                    <textarea id="suggestion" name="suggestion" rows="4" placeholder="Langkah-langkah atau saran penanganan untuk penderita" class="border p-2 rounded w-full" required>{{ old('suggestion', $disease->suggestion) }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between items-center">
                    <a href="{{ route('penyakit.index') }}" class="text-blue-600 hover:underline">← Kembali</a>
                    <x-primary-button class="w-full md:w-auto">
                        {{ __('Perbarui') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
