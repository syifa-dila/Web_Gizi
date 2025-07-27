<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Edit Data Gejala</h1>

        <div class="bg-white p-6 rounded-xl shadow-md border border-green-100">
            <form action="{{ route('gejala.update', $gejalas->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Kode Gejala -->
                <div>
                    <label for="code_symptom" class="block font-semibold text-gray-800 mb-2">Kode Gejala</label>
                    <input type="text" id="code_symptom" name="code_symptom"
                           value="{{ old('code_symptom', $gejalas->code_symptom) }}"
                           placeholder="Contoh: G01"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-300 focus:ring-2"
                           required>
                </div>

                <!-- Nama Gejala -->
                <div>
                    <label for="name_symptom" class="block font-semibold text-gray-800 mb-2">Nama Gejala</label>
                    <input type="text" id="name_symptom" name="name_symptom"
                           value="{{ old('name_symptom', $gejalas->name_symptom) }}"
                           placeholder="Contoh: Berat badan turun"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-300 focus:ring-2"
                           required>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col-reverse md:flex-row justify-between items-center gap-4">
                    <a href="{{ route('gejala.index') }}"
                       class="text-green-700 hover:underline font-medium text-sm">
                        ← Kembali ke Daftar Gejala
                    </a>

                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
