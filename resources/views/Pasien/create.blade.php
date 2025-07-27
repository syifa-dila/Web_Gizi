<x-app-layout>
    <div class="min-h-screen bg-[#f8fdf9] py-10 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-green-700">Tes Diagnosis Gizi Balita</h1>
                <p class="text-sm text-gray-700 mt-2">Silakan isi 3 bagian formulir untuk mengetahui kemungkinan penyakit yang dialami buah hati Anda.</p>
            </div>

            <!-- Bagian 1 -->
            <div class="bg-white border border-green-300 rounded-xl shadow-md p-6 mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-semibold mr-3">1</div>
                    <h2 class="text-lg font-semibold text-green-700">Data Diri Anak</h2>
                </div>
                <p class="text-sm text-gray-600 mb-4">Mohon isi dengan lengkap untuk membantu proses diagnosa.</p>

                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf

                    @php
                        $fields = [
                            ['label' => 'Nama Anak', 'name' => 'nama', 'type' => 'text'],
                            ['label' => 'Jenis Kelamin', 'name' => 'jenis_kelamin', 'type' => 'select', 'options' => ['Laki-laki', 'Perempuan']],
                            ['label' => 'Tanggal Lahir', 'name' => 'tanggal_lahir', 'type' => 'date'],
                            ['label' => 'Nama Ibu', 'name' => 'nama_ibu', 'type' => 'text'],
                            ['label' => 'Nama Ayah', 'name' => 'nama_ayah', 'type' => 'text'],
                            ['label' => 'Alamat', 'name' => 'alamat', 'type' => 'textarea'],
                            ['label' => 'Nomor Kartu Keluarga', 'name' => 'no_kk', 'type' => 'text'],
                            ['label' => 'Nomor Telepon', 'name' => 'no_tlp', 'type' => 'text'],
                            ['label' => 'Riwayat Penyakit', 'name' => 'riwayat_penyakit', 'type' => 'textarea'],
                            ['label' => 'Alergi Makanan', 'name' => 'alergi_makanan', 'type' => 'text'],
                            ['label' => 'Alergi Obat', 'name' => 'alergi_obat', 'type' => 'text'],
                            ['label' => 'Berat Badan (kg)', 'name' => 'berat_badan', 'type' => 'number'],
                            ['label' => 'Tinggi Badan (cm)', 'name' => 'tinggi_badan', 'type' => 'number'],
                        ];
                    @endphp

                    @foreach ($fields as $field)
                        <div class="mb-4">
                            <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-800 mb-1">
                                {{ $field['label'] }}
                            </label>

                            @if ($field['type'] === 'select')
                                <select name="{{ $field['name'] }}" id="{{ $field['name'] }}" required
                                    class="w-full border border-green-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-green-200">
                                    <option value="">-- Pilih {{ $field['label'] }} --</option>
                                    @foreach ($field['options'] as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            @elseif ($field['type'] === 'textarea')
                                <textarea name="{{ $field['name'] }}" id="{{ $field['name'] }}" rows="2"
                                    class="w-full border border-green-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-green-200"
                                    {{ $field['required'] ?? 'required' }}></textarea>
                            @else
                                <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                    {{ in_array($field['type'], ['text', 'number', 'date']) ? 'required' : '' }}
                                    step="{{ $field['type'] === 'number' ? '0.1' : '' }}"
                                    class="w-full border border-green-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-green-200">
                            @endif
                        </div>
                    @endforeach

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow">
                            Selanjutnya →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
