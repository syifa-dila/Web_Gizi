<x-app-layout>
    <div class="max-w-6xl mx-auto mt-16 p-6 bg-green-50 rounded-xl shadow border border-green-100">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-700">Daftar Pengguna</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-800 bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead class="bg-green-100 text-green-800">
                    <tr>
                        <th class="px-4 py-3 text-left border-b">Username</th>
                        <th class="px-4 py-3 text-left border-b">Email</th>
                        <th class="px-4 py-3 text-left border-b">Password</th>
                        <th class="px-4 py-3 text-left border-b">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-green-50 border-b">
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-gray-500 italic">Terenkripsi</td>
                            <td class="px-4 py-3">{{ $user->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-6 text-gray-500 italic">
                                Belum ada data pengguna.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
