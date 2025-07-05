<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Gejala --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-bold text-center mb-6">Gejala yang Sering Terjadi Akibat Gizi Buruk pada Anak</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 justify-items-center">
                    @for ($i = 1; $i <= 4; $i++)
                        <img src="{{ asset('images/gejala' . $i . '.jpg') }}" alt="Gejala {{ $i }}" class="w-32 h-32 object-cover border border-gray-400">
                    @endfor
                </div>
            </div>

            {{-- Penyakit --}}
            <div class="bg-white p-6 rounded shadow mt-10">
                <h3 class="text-xl font-bold text-center mb-6">Beberapa Penyakit yang Terjadi Akibat Gizi Buruk Pada Anak</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 justify-items-center">
                    @for ($i = 1; $i <= 4; $i++)
                        <img src="{{ asset('images/penyakit' . $i . '.jpg') }}" alt="Penyakit {{ $i }}" class="w-32 h-32 object-cover border border-gray-400">
                    @endfor
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-dark-blue text-black py-6 mt-12">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-4 space-y-4 md:space-y-0">
            <div class="flex space-x-4">
                <a href="https://www.instagram.com/puskesmaskademangan/" target="_blank" class="social-icon">
                    <img src="{{ asset('images/instagram.jpeg') }}" alt="Instagram" class="w-10 h-10 object-cover">
                </a>
                <a href="https://www.facebook.com/PuskesmasKademanganCianjur/?locale=id_ID" target="_blank" class="social-icon">
                    <img src="{{ asset('images/facebook.jpeg') }}" alt="Facebook" class="w-10 h-10 object-cover">
                </a>
                <a href="puskesmaskademangan@gmail.com" target="_blank" class="social-icon">
                    <img src="{{ asset('images/Gmail.jpeg') }}" alt="Gmail" class="w-10 h-10 object-cover">
                </a>
            </div>
            <div class="text-center text-sm text-gray-700">
                <p>Jl. Raya Jangari, Kademangan, Kec. Mande, Kabupaten Cianjur, Jawa Barat </p>
                <p>No Telepon: 0821-3019-1370</p>
                <p>Kode Pos: 43292</p>
            </div>
            <div class="relative">
                <img src="{{ asset('images/puskesmas.jpg') }}" alt="Logo Puskesmas" class="w-14 h-auto ml-2">
            </div>

        </div>
    </footer>
</x-app-layout>
