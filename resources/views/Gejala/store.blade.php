<x-app-layout>
    <div class="min-h-screen bg-white py-10 px-4">
        <h1 class="text-xl md:text-2xl font-bold text-center mb-4">Data Anak yang Telah Disimpan</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-black text-sm text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Jenis Kelamin</th>
                        <th class="border px-4 py-2">Tanggal Lahir</th>
                        <th class="border px-4 py-2">Orang Tua</th>
                        <th class="border px-4 py-2">Alamat</th>
                        <th class="border px-4 py-2">No KK</th>
                        <th class="border px-4 py-2">No Telepon</th>
                        <th class="border px-4 py-2">Berat</th>
                        <th class="border px-4 py-2">Tinggi</th>
                        <th class="border px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dataAnak = session('data_anak');
                    @endphp

                    @if ($dataAnak)
                        <tr>
                            <td class="border px-4 py-2">1</td>
                            <td class="border px-4 py-2">{{ $dataAnak['nama'] }}</td>
                            <td class="border px-4 py-2">{{ $dataAnak['jenis_kelamin'] }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($dataAnak['tanggal_lahir'])->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">
                                Ibu: {{ $dataAnak['nama_ibu'] }}<br>
                                Ayah: {{ $dataAnak['nama_ayah'] }}
                            </td>
                            <td class="border px-4 py-2">{{ $dataAnak['alamat'] }}</td>
                            <td class="border px-4 py-2">{{ $dataAnak['no_kk'] }}</td>
                            <td class="border px-4 py-2">{{ $dataAnak['no_tlp'] }}</td>
                            <td class="border px-4 py-2">{{ $dataAnak['berat_badan'] }} kg</td>
                            <td class="border px-4 py-2">{{ $dataAnak['tinggi_badan'] }} cm</td>
                            <td class="border px-4 py-2 text-sm space-y-1">
                                @if(strtolower($dataAnak['riwayat_penyakit']) == 'ya')
                                    <div class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Ada Riwayat Penyakit</div>
                                @endif

                                @if(strtolower($dataAnak['alergi_makanan']) == 'ya')
                                    <div class="bg-pink-200 text-pink-800 px-2 py-1 rounded">Alergi Makanan</div>
                                @endif

                                @if(strtolower($dataAnak['alergi_obat']) == 'ya')
                                    <div class="bg-red-200 text-red-800 px-2 py-1 rounded">Alergi Obat</div>
                                @endif
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="11" class="border px-4 py-2 text-center text-gray-500">
                                Tidak ada data yang tersedia.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('diagnosis.gejala') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Lanjut ke Diagnosa
            </a>
        </div>
    </div>
</x-app-layout>
