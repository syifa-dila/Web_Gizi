<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Profil Pengguna</h1>

        <div class="bg-white rounded shadow p-6 mb-6">
            <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        <!-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('profile.edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-center">Edit Profil</a>
            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Yakin ingin menghapus akun?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded w-full hover:bg-red-600">Hapus Akun</button>
            </form>
        </div> -->
    </div>
</x-app-layout>
