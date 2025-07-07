<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Tambah Informasi Penyakit</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Penyakit</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="5" class="w-full border rounded p-2" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Upload Gambar</label>
                <input type="file" name="gambar" class="w-full">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
