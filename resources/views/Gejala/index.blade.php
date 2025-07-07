@forelse ($dataAnak as $index => $anak)
<tr>
    <td class="border px-4 py-2">{{ $index + 1 }}</td>
    <td class="border px-4 py-2">{{ $anak->nama }}</td>
    <td class="border px-4 py-2">{{ $anak->jenis_kelamin }}</td>
    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y') }}</td>
    <td class="border px-4 py-2">
        Ibu: {{ $anak->nama_ibu }}<br>
        Ayah: {{ $anak->nama_ayah }}
    </td>
    <td class="border px-4 py-2">{{ $anak->alamat }}</td>
    <td class="border px-4 py-2">{{ $anak->no_kk }}</td>
    <td class="border px-4 py-2">{{ $anak->no_tlp }}</td>
    <td class="border px-4 py-2">{{ $anak->berat_badan }} kg</td>
    <td class="border px-4 py-2">{{ $anak->tinggi_badan }} cm</td>

    <!-- Kolom tambahan untuk info "ya" -->
    <td class="border px-4 py-2 text-sm text-center space-y-1">
        @if(strtolower($anak->riwayat_penyakit) == 'ya')
            <div class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Ada Riwayat Penyakit</div>
        @endif

        @if(strtolower($anak->alergi_makanan) == 'ya')
            <div class="bg-pink-200 text-pink-800 px-2 py-1 rounded">Alergi Makanan</div>
        @endif

        @if(strtolower($anak->alergi_obat) == 'ya')
            <div class="bg-red-200 text-red-800 px-2 py-1 rounded">Alergi Obat</div>
        @endif
    </td>

    <td class="border px-4 py-2 text-center">
        <a href="{{ route('diagnosis.show', $anak->id) }}" class="text-blue-500 hover:underline">Lihat</a> |
        <a href="{{ route('diagnosis.edit', $anak->id) }}" class="text-yellow-500 hover:underline">Edit</a> |
        <form action="{{ route('diagnosis.destroy', $anak->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
        </form>
    </td>
</tr>
@empty
    <tr>
        <td colspan="12" class="border px-4 py-2 text-center text-gray-500">Belum ada data anak balita.</td>
    </tr>
@endforelse
