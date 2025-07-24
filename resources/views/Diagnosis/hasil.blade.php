<x-app-layout>
    <h2>Hasil Diagnosis untuk {{ $pasien->nama }}</h2>

<table>
    <thead>
        <tr>
            <th>Penyakit</th>
            <th>Nilai CF</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hasil as $data)
            <tr>
                <td>{{ $data['disease']->nama_penyakit }}</td>
                <td>{{ number_format($data['cf_combine'], 4) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>
