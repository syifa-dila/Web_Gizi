<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-bold mb-6">Tambah Aturan Nilai CF</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rules.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="disease_id" class="block font-semibold mb-1">Penyakit</label>
                <select name="disease_id" id="disease_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Penyakit --</option>
                    @foreach ($diseases as $disease)
                        <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="gejala_id" class="block font-semibold mb-1">Gejala</label>
                <select name="gejala_id" id="gejala_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Gejala --</option>
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->id }}">{{ $gejala->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="CF_user" class="block font-semibold mb-1">CF User</label>
                <input type="number" step="0.001" name="CF_user" id="CF_user" class="w-full border rounded px-3 py-2" placeholder="0.8">
            </div>

            <div>
                <label for="CF_pakar" class="block font-semibold mb-1">CF Pakar</label>
                <input type="number" step="0.001" name="CF_pakar" id="CF_pakar" class="w-full border rounded px-3 py-2" placeholder="0.9">
            </div>

            <div>
                <label for="combine" class="block font-semibold mb-1">Combine (optional)</label>
                <input type="number" step="0.001" name="combine" id="combine" class="w-full border rounded px-3 py-2" placeholder="Hasil kombinasi (jika ada)">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('rules.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
