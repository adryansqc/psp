{{-- Modern Header --}}
<header class="fixed top-0 left-0 right-0 h-16 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md border-b border-gray-200/20 dark:border-slate-700/20 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
        {{-- Logo --}}
        <div class="flex items-center">
            <a href="/" class="flex items-center space-x-3 group">
                @if ($settingItems['logo']->value && Storage::disk('public')->exists($settingItems['logo']->value))
                    <img src="{{ Storage::url($settingItems['logo']->value) }}" alt="logo" class="h-10 w-auto rounded-lg shadow-sm group-hover:shadow-md transition-shadow duration-300" />
                @else
                    <img src="{{ asset('/') }}assets/images/image-thumbnail.jpg" alt="logo" class="h-10 w-auto rounded-lg shadow-sm group-hover:shadow-md transition-shadow duration-300" />
                @endif
                <span class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-indigo-600 bg-clip-text text-transparent">
                    {{ $settingItems['site_name']->value ?? 'NAMA WEBSITE' }}
                </span>
            </a>
        </div>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center space-x-8">
            <a href="/" class="relative px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400 transition-colors duration-200 group">
                Beranda
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-sky-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="#announcement" class="relative px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400 transition-colors duration-200 group">
                Pengumuman
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-sky-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
            </a>
        </nav>

        {{-- Right Section --}}
        <div class="flex items-center space-x-4">
            @auth
                {{-- User Profile Dropdown --}}
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="cursor-pointer flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 text-gray-500 dark:text-gray-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-56 bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-gray-200 dark:border-slate-700 py-2">
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-slate-700">
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email ?? 'user@example.com' }}</p>
                        </div>
                        <a href="{{ route('filament.admin.pages.my-profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profil Saya
                        </a>
                        <a href="{{ route('filament.admin.pages.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" viewBox="0 0 25 25" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M14.5 19.5V12.5M10.5 12.5V5.5M5.5 12.5H19.5M5.5 19.5H19.5V5.5H5.5V19.5Z" stroke="currentColor" stroke-width="2.15"></path>
                                </g>
                            </svg>
                            Dashboard
                        </a>
                    </div>
                </div>
            @endauth

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="cursor-pointer md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

{{-- Mobile Sidebar Overlay --}}
<div id="mobile-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden md:hidden"></div>

{{-- Mobile Sidebar --}}
<div id="mobile-sidebar" class="fixed top-0 right-0 h-full w-80 max-w-[90vw] bg-white dark:bg-slate-900 shadow-2xl transform translate-x-full transition-transform duration-300 z-50">
    <div class="flex flex-col h-full">
        {{-- Header --}}
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-slate-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Menu</h2>
            <button id="close-mobile-sidebar" class="cursor-pointer p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-6 py-4 space-y-2">
            <a href="/" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Beranda
            </a>
            <a href="#announcement" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                Pengumuman
            </a>

            @auth
                <div class="pt-4 border-t border-gray-200 dark:border-slate-700">
                    <a href="{{ route('filament.admin.pages.my-profile') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profil Saya
                    </a>
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H9z"></path>
                        </svg>
                        Dashboard
                    </a>
                </div>
            @endauth
        </nav>
    </div>
</div>

<script>
    // Mobile menu functionality
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const closeMobileSidebar = document.getElementById('close-mobile-sidebar');

    mobileMenuBtn.addEventListener('click', () => {
        mobileSidebar.classList.remove('translate-x-full');
        mobileOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    function closeMobileMenu() {
        mobileSidebar.classList.add('translate-x-full');
        mobileOverlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    closeMobileSidebar.addEventListener('click', closeMobileMenu);
    mobileOverlay.addEventListener('click', closeMobileMenu);
</script>
