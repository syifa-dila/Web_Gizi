<x-app-layout>
    <div class="max-w-6xl mx-auto mt-16 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Daftar Pengguna</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Username</th>
                        <th class="border px-4 py-2 text-left">Email</th>
                        <th class="border px-4 py-2 text-left">Password</th>
                        <th class="border px-4 py-2 text-left">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>

                        {{-- Jika kamu menyimpan password asli (plaintext) --}}
                        {{-- <td class="border px-4 py-2">{{ $user->password }}</td> --}}

                        {{-- Jika kamu menyimpan hash dan tidak ingin menampilkan hash --}}
                        <td class="border px-4 py-2 text-gray-500 italic">Terenkripsi</td>

                        <td class="border px-4 py-2">{{ $user->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
