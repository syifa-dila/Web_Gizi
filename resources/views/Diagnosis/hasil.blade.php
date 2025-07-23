<!-- <x-app-layout>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h3>Hasil Perhitungan Certainty Factor</h3>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>No</th>
            <th>Gejala</th>
            <th>CF User</th>
            <th>CF Pakar</th>
            <th>CF x Pakar</th>
            <th>Penyakit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tabel_hitungan as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item['gejala'] }}</td>
                <td>{{ $item['cf_user'] }}</td>
                <td>{{ $item['cf_pakar'] }}</td>
                <td>{{ number_format($item['cf_x_pakar'], 2) }}</td>
                <td>{{ $item['penyakit'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<h4>Hasil Diagnosis Akhir:</h4>
<p>
    <strong>{{ $penyakit_tertinggi->nama }}</strong><br>
    Nilai CF Combine: <strong>{{ number_format($nilai_cf_tertinggi * 100, 2) }}%</strong>
</p>

        <div class="mt-6 text-center">
            <a href="{{ route('dashboard') }}" class="text-blue-500 underline">Kembali ke Beranda</a>
        </div>
    </div>
</x-app-layout> -->
