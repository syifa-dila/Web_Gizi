<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <h2 class="text-3xl font-bold mb-6 text-center text-green-700">Edit Aturan Certainty Factor</h2>

        {{-- Form Edit Aturan --}}
        <form action="{{ route('rules.update', $rule->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow border border-green-100">
            @csrf
            @method('PUT')

            {{-- Penyakit --}}
            <div>
                <label for="diseases_id" class="block text-gray-800 font-semibold mb-2">Pilih Penyakit</label>
                <select name="diseases_id" id="diseases_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-green-300">
                    @foreach ($diseases as $disease)
                        <option value="{{ $disease->id }}" {{ $rule->diseases_id == $disease->id ? 'selected' : '' }}>
                            {{ $disease->disease_code }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Gejala --}}
            <div>
                <label for="gejalas_id" class="block text-gray-800 font-semibold mb-2">Pilih Gejala</label>
                <select name="gejalas_id" id="gejalas_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-green-300">
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->id }}" {{ $rule->gejalas_id == $gejala->id ? 'selected' : '' }}>
                            {{ $gejala->code_symptom }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nilai CF --}}
            <div>
                <label for="cf_pakar" class="block text-gray-800 font-semibold mb-2">Nilai CF Pakar</label>
                <input type="number" step="0.1" min="0" max="1" name="cf_pakar" id="cf_pakar"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300"
                       value="{{ old('cf_pakar', $rule->cf_pakar) }}" required>
                <small class="text-gray-500">Masukkan angka antara 0 dan 1, contoh: 0.4, 0.7</small>
            </div>

            {{-- Tombol Update --}}
            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                    Update Aturan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
