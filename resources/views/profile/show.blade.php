<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Profil Admin</h1>

        <div class="bg-green-50 border border-green-200 rounded-xl shadow p-6 text-center">
            <p class="text-lg text-gray-800 mb-2">
                <strong>Username:</strong> {{ Auth::user()->name }}
            </p>
            <p class="text-lg text-gray-800">
                <strong>Email:</strong> {{ Auth::user()->email }}
            </p>
        </div>

        <div class="mt-8 flex justify-center gap-6">
            <a href="{{ route('riwayat.index') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition duration-200">
                🩺 Riwayat Diagnosis Pasien
            </a>
            <a href="{{ route('user.index') }}"
               class="bg-white border border-green-600 text-green-700 font-semibold px-5 py-2 rounded-lg hover:bg-green-100 shadow transition duration-200">
                👥 Daftar Pengguna
            </a>
        </div>

    </div>
</x-app-layout>
