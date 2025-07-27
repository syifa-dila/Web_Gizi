<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-50 py-10 px-4">
        <div class="w-full max-w-xl bg-white border border-green-200 shadow-md rounded-xl p-8">
            <h2 class="text-3xl font-bold text-green-700 text-center mb-6">Registrasi</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Nama -->
                <div>
                    <x-input-label for="name" class="text-gray-800 font-semibold" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <x-input-label for="birth_date" class="text-gray-800 font-semibold" :value="__('Tanggal Lahir')" />
                    <x-text-input id="birth_date" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="date" name="birth_date" :value="old('birth_date')" required />
                    <x-input-error :messages="$errors->get('birth_date')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <x-input-label for="gender" class="text-gray-800 font-semibold" :value="__('Jenis Kelamin')" />
                    <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- No HP -->
                <div>
                    <x-input-label for="phone_number" class="text-gray-800 font-semibold" :value="__('Nomor HP')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="text" name="phone_number" :value="old('phone_number')" required />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Alamat -->
                <div>
                    <x-input-label for="address" class="text-gray-800 font-semibold" :value="__('Alamat')" />
                    <x-text-input id="address" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="text" name="address" :value="old('address')" required />
                    <x-input-error :messages="$errors->get('address')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" class="text-gray-800 font-semibold" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" class="text-gray-800 font-semibold" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <x-input-label for="password_confirmation" class="text-gray-800 font-semibold" :value="__('Konfirmasi Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-green-500" 
                                  type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Tombol Daftar -->
                <div class="flex items-center justify-between pt-4">
                    <a class="underline text-sm text-green-700 hover:text-green-800" href="{{ route('login') }}">
                        {{ __('Sudah punya akun? Masuk') }}
                    </a>

                    <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
