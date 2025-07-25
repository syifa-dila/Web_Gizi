<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Judul Halaman --}}
            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-2">Dashboard Diagnosis Gizi Buruk Anak</h2>
                <p class="text-gray-600 text-sm">Informasi seputar gejala dan penyakit yang berkaitan dengan gangguan gizi buruk pada balita</p>
            </div>

            {{-- Gejala Umum --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold text-blue-700 mb-4 border-b pb-2">Gejala Umum Gizi Buruk</h3>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-gray-700 list-disc list-inside">
                    <li>Berat badan menurun secara drastis</li>
                    <li>Wajah tampak tua dari usia sebenarnya</li>
                    <li>Perut buncit, tetapi tubuh kurus</li>
                    <li>Sering sakit dan daya tahan tubuh rendah</li>
                    <li>Kulit kering, bersisik, dan mudah terluka</li>
                    <li>Kurang konsentrasi dan lesu</li>
                </ul>
            </div>

            {{-- Penyakit Terkait --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold text-blue-700 mb-4 border-b pb-2">Penyakit yang Sering Terjadi</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 text-gray-700">
                    <div>
                        <h4 class="font-semibold text-md text-blue-600">1. Marasmus</h4>
                        <p class="text-sm">Kekurangan energi dan protein yang menyebabkan tubuh sangat kurus, kering, dan tulang menonjol.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-md text-blue-600">2. Kwashiorkor</h4>
                        <p class="text-sm">Penyakit akibat kekurangan protein dengan gejala perut buncit dan pembengkakan pada beberapa bagian tubuh.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-md text-blue-600">3. Stunting</h4>
                        <p class="text-sm">Kondisi gagal tumbuh karena kekurangan gizi kronis, ditandai dengan tinggi badan lebih pendek dari anak seusianya.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-md text-blue-600">4. Anemia</h4>
                        <p class="text-sm">Kekurangan zat besi menyebabkan tubuh lemah, mudah lelah, dan kurang fokus.</p>
                    </div>
                </div>
            </div>

            {{-- Aksi Diagnosis --}}
            <div class="text-center mt-10">
                <a href="{{ route('pasien.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-full shadow-md transition duration-300">
                    Mulai Diagnosis Sekarang
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
