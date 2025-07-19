<x-app-layout>
    <div class="min-h-screen bg-white py-10 px-4">
        <h1 class="text-xl md:text-2xl font-bold text-center mb-2">Tes Diagnosis Kekurangan Gizi Pada Anak Balita</h1>
        <p class="text-sm text-center mb-6">Terdapat tiga Tabel yang harus Bunda isi untuk mengetahui Penyakit yang dialami sang buah hati</p>
  <div class="w-full max-w-3xl mx-auto rounded-md p-6">
            <div class="flex items-center mb-4">
                <div class="w-6 h-6 border border-black rounded-full flex items-center justify-center text-sm font-semibold mr-2">1</div>
                <p class="text-base font-semibold">Data Diri Anak</p>
            </div>
        <p class="text-sm mb-4">Tolong isi diri anak</p>
        </div>
        <div class="w-full max-w-3xl mx-auto bg-white border border-black rounded-md p-6 shadow-md">
            <form action="{{ route('pasien.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium">Nama Anak</label>
                    <input type="text" name="nama" id="nama" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required class="w-full border-2 border-black rounded px-3 py-1.5">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="nama_ibu" class="block text-sm font-medium">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="nama_ayah" class="block text-sm font-medium">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="2" required class="w-full border-2 border-black rounded px-3 py-1.5"></textarea>
                </div>
                <div class="mb-4">
                    <label for="no_kk" class="block text-sm font-medium">Nomor Kartu Keluarga</label>
                    <input type="text" name="no_kk" id="no_kk" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="no_tlp" class="block text-sm font-medium">Nomor Telepon</label>
                    <input type="text" name="no_tlp" id="no_tlp" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="riwayat_penyakit" class="block text-sm font-medium">Riwayat Penyakit</label>
                    <textarea name="riwayat_penyakit" id="riwayat_penyakit" rows="2" class="w-full border-2 border-black rounded px-3 py-1.5"></textarea>
                </div>
                <div class="mb-4">
                    <label for="alergi_makanan" class="block text-sm font-medium">Alergi Makanan</label>
                    <input type="text" name="alergi_makanan" id="alergi_makanan" class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="alergi_obat" class="block text-sm font-medium">Alergi Obat</label>
                    <input type="text" name="alergi_obat" id="alergi_obat" class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="berat_badan" class="block text-sm font-medium">Berat Badan (kg)</label>
                    <input type="number" step="0.1" name="berat_badan" id="berat_badan" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>
                <div class="mb-4">
                    <label for="tinggi_badan" class="block text-sm font-medium">Tinggi Badan (cm)</label>
                    <input type="number" step="0.1" name="tinggi_badan" id="tinggi_badan" required class="w-full border-2 border-black rounded px-3 py-1.5">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-white border border-black px-4 py-2 rounded hover:bg-gray-100">Selanjutnya</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
