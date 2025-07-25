<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-bold mb-4">Tambah Aturan CF</h2>

        <form action="{{ route('rules.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="diseases_id" class="block font-semibold">Pilih Penyakit</label>
                <select name="diseases_id" id="diseases_id" class="w-full border rounded px-3 py-2">
                    @foreach ($diseases as $disease)
                        <option value="{{ $disease->id }}">{{ $disease->disease_code }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="gejalas_id" class="block font-semibold">Pilih Gejala</label>
                <select name="gejalas_id" id="gejalas_id" class="w-full border rounded px-3 py-2">
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->id }}">{{ $gejala->code_symptom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="cf_pakar">Nilai CF Pakar</label>
                <input type="number" step="0.1" min="0" max="1" name="cf_pakar" id="cf_pakar" required>

            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
