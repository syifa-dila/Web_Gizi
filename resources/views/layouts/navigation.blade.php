<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/puskesmas.jpg') }}" alt="logo" class="w-14 h-auto">
                    <span class="text-lg font-bold text-gray-900 tracking-wide">Puskesmas Kademangan</span>
                </div>
                <div class="flex space-x-10 text-sm font-medium text-blue-900">
                    {{-- Beranda: Selalu tampil --}}
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Beranda') }}
                    </x-nav-link>

                    {{-- Guest --}}
                    @guest
                        <x-nav-link :href="route('Ipenyakit.index')" :active="request()->routeIs('Ipenyakit.index')">
                            {{ __('Informasi Penyakit') }}
                        </x-nav-link>
                        <x-nav-link :href="route('jam.operasional')" :active="request()->routeIs('jam.operasional')">
                            {{ __('Jam Operasional') }}
                        </x-nav-link>
                    @endguest

                    {{-- Pasien --}}
                    @auth
                        @if(Auth::user()->role_id == 2)
                            <x-nav-link :href="route('pasien.create')" :active="request()->routeIs('pasien.create')">
                                {{ __('Diagnosis') }}
                            </x-nav-link>
                            <x-nav-link :href="route('Ipenyakit.index')" :active="request()->routeIs('Ipenyakit.index')">
                                {{ __('Informasi Penyakit') }}
                            </x-nav-link>
                            <x-nav-link :href="route('jam.operasional')" :active="request()->routeIs('jam.operasional')">
                                {{ __('Jam Operasional') }}
                            </x-nav-link>
                        @endif

                        {{-- Admin --}}
                        @if(Auth::user()->role_id == 1)
                            <x-nav-link :href="route('gejala.index')" :active="request()->routeIs('gejala.index')">
                                {{ __('Kelola Gejala') }}
                            </x-nav-link>
                            <x-nav-link :href="route('penyakit.index')" :active="request()->routeIs('penyakit.index')">
                                {{ __('Kelola Penyakit') }}
                            </x-nav-link>
                            <x-nav-link :href="route('rules.index')" :active="request()->routeIs('rules.index')">
                                {{ __('Kelola nilai CF') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            {{-- Bagian kanan: Dropdown User --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.show')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Edit') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                  onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="hidden sm:flex sm:items-center sm:space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-800">Login</a>
                        <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-800">Register</a>
                    </div>
                @endauth
            </div>

            {{-- Mobile menu button --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Responsive Menu --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>

            @guest
                <x-responsive-nav-link :href="route('Ipenyakit.index')" :active="request()->routeIs('Ipenyakit.index')">
                    {{ __('Informasi Penyakit') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('jam.operasional')" :active="request()->routeIs('jam.operasional')">
                    {{ __('Jam Operasional') }}
                </x-responsive-nav-link>
            @endguest

            @auth
                @if(Auth::user()->role_id == 2)
                    <x-responsive-nav-link :href="route('pasien.create')" :active="request()->routeIs('pasien.create')">
                        {{ __('Diagnosis') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('Ipenyakit.index')" :active="request()->routeIs('Ipenyakit.index')">
                        {{ __('Informasi Penyakit') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('jam.operasional')" :active="request()->routeIs('jam.operasional')">
                        {{ __('Jam Operasional') }}
                    </x-responsive-nav-link>
                @endif

                @if(Auth::user()->role_id == 1)
                    <x-responsive-nav-link :href="route('gejala.index')" :active="request()->routeIs('gejala.index')">
                        {{ __('Kelola Gejala') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('penyakit.index')" :active="request()->routeIs('penyakit.index')">
                        {{ __('Kelola Penyakit') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('rules.index')" :active="request()->routeIs('rules.index')">
                        {{ __('Kelola nilai CF') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        {{-- Profile Section --}}
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Edit') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4 space-y-2">
                    <a href="{{ route('login') }}" class="block text-sm text-gray-600 hover:text-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="block text-sm text-gray-600 hover:text-gray-800">Register</a>
                </div>
            </div>
        @endguest
    </div>
</nav>
