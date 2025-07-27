<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Edit Data Penyakit</h1>

        <div class="bg-white p-6 rounded-xl shadow-md border border-green-100">
            <form action="{{ route('penyakit.update', $disease->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Kode dan Nama Penyakit -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="disease_code" class="block font-semibold text-gray-800 mb-2">Kode Penyakit</label>
                        <input type="text" id="disease_code" name="disease_code"
                               value="{{ old('disease_code', $disease->disease_code) }}"
                               placeholder="Contoh: P01"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-300 focus:ring-2"
                               required>
                    </div>

                    <div>
                        <label for="name_disease" class="block font-semibold text-gray-800 mb-2">Nama Penyakit</label>
                        <input type="text" id="name_disease" name="name_disease"
                               value="{{ old('name_disease', $disease->name_disease) }}"
                               placeholder="Contoh: Marasmus"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-300 focus:ring-2"
                               required>
                    </div>
                </div>

                <!-- Informasi Penyakit -->
                <div>
                    <label for="information" class="block font-semibold text-gray-800 mb-2">Informasi Penyakit</label>
                    <textarea id="information" name="information" rows="3"
                              placeholder="Deskripsi singkat mengenai penyakit ini"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-300 focus:ring-2"
                              required>{{ old('information', $disease->information) }}</textarea>
                </div>

                <!-- Saran Penanganan -->
                <div>
                    <label for="suggestion" class="block font-semibold text-gray-800 mb-2">Saran Penanganan</label>
                    <textarea id="suggestion" name="suggestion" rows="4"
                              placeholder="Langkah-langkah atau saran penanganan untuk penderita"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-300 focus:ring-2"
                              required>{{ old('suggestion', $disease->suggestion) }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col-reverse md:flex-row justify-between items-center gap-4">
                    <a href="{{ route('penyakit.index') }}"
                       class="text-green-700 hover:underline font-medium text-sm">
                        ← Kembali ke Daftar Penyakit
                    </a>

                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
