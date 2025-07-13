<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Gejala</h1>

        <form action="{{ route('gejala.update', $gejalas->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Kode Gejala</label>
                <input type="text" name="code_symptom" value="{{ old('code_symptom', $gejalas->code_symptom) }}" class="border p-2 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Gejala</label>
                <input type="text" name="name_symptom" value="{{ old('name_symptom', $gejalas->name_symptom) }}" class="border p-2 rounded w-full" required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('gejala.index') }}" class="text-gray-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
