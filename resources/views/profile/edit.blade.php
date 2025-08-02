<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-green-700 leading-tight">
            {{ __('Edit Profil Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            {{-- Form Update Informasi Profil --}}
            <div class="bg-white border border-gray-200 shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Ubah Informasi Profil</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Form Update Password --}}
            <div class="bg-white border border-gray-200 shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Ubah Password</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Form Hapus Akun (opsional - dikomentari) --}}
            {{-- 
            <div class="bg-white border border-red-200 shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-red-700 mb-4">Hapus Akun</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> 
            --}}
        </div>
    </div>
</x-app-layout>
