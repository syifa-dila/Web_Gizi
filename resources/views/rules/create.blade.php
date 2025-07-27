<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <h2 class="text-3xl font-bold mb-6 text-center text-green-700">Tambah Aturan Certainty Factor</h2>

        {{-- Form Tambah Aturan --}}
        <form action="{{ route('rules.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow border border-green-100">
            @csrf

            {{-- Penyakit --}}
            <div>
                <label for="diseases_id" class="block text-gray-800 font-semibold mb-2">Pilih Penyakit</label>
                <select name="diseases_id" id="diseases_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-green-300">
                    @foreach ($diseases as $disease)
                        <option value="{{ $disease->id }}">{{ $disease->disease_code }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Gejala --}}
            <div>
                <label for="gejalas_id" class="block text-gray-800 font-semibold mb-2">Pilih Gejala</label>
                <select name="gejalas_id" id="gejalas_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-green-300">
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->id }}">{{ $gejala->code_symptom }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Nilai CF --}}
            <div>
                <label for="cf_pakar" class="block text-gray-800 font-semibold mb-2">Nilai CF Pakar</label>
                <input type="number" step="0.1" min="0" max="1" name="cf_pakar" id="cf_pakar"
                       placeholder="Masukkan nilai antara 0 hingga 1"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300"
                       required>
                <small class="text-gray-500">Contoh: 0.2, 0.5, 0.8. Nilai harus antara 0 dan 1.</small>
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                    Simpan Aturan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
