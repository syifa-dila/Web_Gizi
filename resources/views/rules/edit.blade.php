<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-bold mb-4">Edit Aturan CF</h2>

        <form action="{{ route('rules.update', $rule->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="disease_code" class="block font-semibold">Pilih Penyakit</label>
<select name="disease_id" id="disease_id" class="w-full border rounded px-3 py-2">
    @foreach ($diseases as $disease)
        <option value="{{ $disease->id }}" {{ $rule->disease_id == $disease->id ? 'selected' : '' }}>
            {{ $disease->disease_code }}
        </option>
    @endforeach
</select>

            </div>

            <div>
                <label for="code_symptom" class="block font-semibold">Pilih Gejala</label>
                <select name="gejala_id" id="gejala_id" class="w-full border rounded px-3 py-2">
                    @foreach ($gejalas as $gejala)
                <option value="{{ $gejala->id }}" {{ $rule->gejala_id == $gejala->id ? 'selected' : '' }}>
                    {{ $gejala->code_symptom }}
                </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="cf_pakar" class="block font-semibold">Nilai CF Pakar</label>
                <input type="number" step="0.01" name="cf_pakar" id="cf_pakar" class="w-full border rounded px-3 py-2" value="{{ old('cf_pakar', $rule->cf_pakar) }}" required>
            </div>
            <div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
