@php use Carbon\Carbon; @endphp

<x-app-layout>
    <div class="bg-white min-h-screen py-10 px-6">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Jam Operasional Puskesmas</h1>

            @php
                // Daftar hari dan jam operasional
                $hari = [
                    'Senin' => '07.00 - 11.30',
                    'Selasa' => '07.00 - 11.30',
                    'Rabu' => '07.00 - 11.30',
                    'Kamis' => '07.00 - 11.30',
                    'Jumat' => '07.00 - 11.30',
                    'Sabtu' => 'Tutup',
                    'Minggu' => 'Tutup',
                ];

                // Tanggal hari ini
                $today = Carbon::now();
                $hariIni = ucfirst($today->locale('id')->isoFormat('dddd'));
                $tanggalHariIni = $today->format('Y-m-d');

                // Daftar hari libur nasional (format: 'YYYY-MM-DD' => 'Nama Hari Libur')
                $liburNasional = [
                    // 2025
                    '2025-01-01' => 'Tahun Baru Masehi',
                    '2025-03-31' => 'Hari Raya Nyepi',
                    '2025-04-18' => 'Wafat Isa Almasih',
                    '2025-05-01' => 'Hari Buruh',
                    '2025-05-29' => 'Kenaikan Isa Almasih',
                    '2025-06-01' => 'Hari Lahir Pancasila',
                    '2025-07-29' => 'Tahun Baru Islam',
                    '2025-08-17' => 'Hari Kemerdekaan RI',
                    '2025-12-25' => 'Hari Natal',

                    // 2026
                    '2026-01-01' => 'Tahun Baru 2026',
                    '2026-03-19' => 'Hari Raya Nyepi',
                    '2026-04-03' => 'Wafat Isa Almasih',
                    '2026-05-01' => 'Hari Buruh Internasional',
                    '2026-05-21' => 'Kenaikan Isa Almasih',
                    '2026-06-01' => 'Hari Lahir Pancasila',
                    '2026-08-17' => 'Hari Kemerdekaan',
                    '2026-12-25' => 'Hari Raya Natal',
                ];

                // Cek apakah hari ini adalah libur nasional
                $isLibur = array_key_exists($tanggalHariIni, $liburNasional);
                $namaLibur = $isLibur ? $liburNasional[$tanggalHariIni] : null;
            @endphp

            {{-- Tabel Jadwal --}}
            <table class="w-full border border-gray-300 rounded shadow-sm">
                <thead class="bg-blue-100 text-gray-700 text-left">
                    <tr>
                        <th class="py-2 px-4">Hari</th>
                        <th class="py-2 px-4">Jam Operasional</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($hari as $namaHari => $jam)
                        <tr class="{{ $namaHari == $hariIni ? 'bg-yellow-100 font-semibold' : '' }}">
                            <td class="py-2 px-4">{{ $namaHari }}</td>
                            <td class="py-2 px-4">{{ $jam }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Info Hari Ini --}}
            <div class="mt-4 text-center text-sm text-gray-700">
                @if ($isLibur || $hari[$hariIni] === 'Tutup')
                    <p class="text-red-600 font-semibold">
                        Hari ini adalah <strong>{{ $hariIni }}</strong>, tanggal <strong>{{ $today->translatedFormat('d F Y') }}</strong>.<br>
                        @if ($isLibur)
                            Libur Nasional: <strong>{{ $namaLibur }}</strong> — Puskesmas <u>TUTUP</u>.
                        @else
                            Puskesmas <u>TUTUP</u> pada hari ini.
                        @endif
                    </p>
                @else
                    <p>
                        Hari ini adalah <strong>{{ $hariIni }}</strong>, tanggal <strong>{{ $today->translatedFormat('d F Y') }}</strong>.<br>
                        Jam buka: <strong>{{ $hari[$hariIni] }}</strong>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
