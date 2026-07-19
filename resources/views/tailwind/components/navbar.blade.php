<header
    x-data="{ mobileOpen: false, projectsOpen: false, langOpen: false, lang: 'ID', scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40)"
    :class="scrolled && 'shadow-md'"
    class="fixed top-0 inset-x-0 z-50 bg-white border-b border-ink/5 transition-shadow duration-300"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-20">

            <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0 border border-forest/15 rounded-full pl-2 pr-4 py-1.5">
                <img src="{{ asset('dummypsp') }}/assets/images/Logo_psp.png" alt="Logo PSP" class="h-8 w-8 object-contain">
                <span class="font-display text-2xl tracking-wide text-forest">PSP</span>
                <span class="hidden sm:inline text-[11px] uppercase tracking-[0.2em] text-forest-light self-end mb-1">
                    Putra Sentosa Prakarsa
                </span>
            </a>

            <nav class="hidden lg:flex items-center gap-10 font-body text-sm">
                <a href="{{ url('/') }}" class="text-forest hover:text-gold transition-colors">
                    Beranda
                </a>

                <div class="relative" @mouseenter="projectsOpen = true" @mouseleave="projectsOpen = false">
                    <button class="flex items-center gap-1 text-forest hover:text-gold transition-colors">
                        Proyek
                        <svg class="w-3.5 h-3.5 transition-transform" :class="projectsOpen && 'rotate-180'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        x-show="projectsOpen"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-cloak
                        class="absolute left-0 top-full mt-2 w-64 bg-white border border-ink/10 rounded-md shadow-xl overflow-hidden"
                    >
                        <a href="{{ url('/proyek') }}" class="block px-5 py-3 text-sm text-forest hover:bg-cream hover:text-gold transition-colors">
                            Semua Proyek
                        </a>
                        <a href="{{ url('/proyek?tipe=residensial') }}" class="block px-5 py-3 text-sm text-forest hover:bg-cream hover:text-gold transition-colors">
                            Residensial
                        </a>
                        <a href="{{ url('/proyek?tipe=komersial') }}" class="block px-5 py-3 text-sm text-forest hover:bg-cream hover:text-gold transition-colors">
                            Komersial
                        </a>
                    </div>
                </div>

                <a href="{{ url('/tentang') }}" class="text-forest hover:text-gold transition-colors">
                    Tentang Kami
                </a>
                <a href="{{ url('/berita') }}" class="text-forest hover:text-gold transition-colors">
                    Berita
                </a>
                <a href="{{ url('/kontak') }}" class="text-forest hover:text-gold transition-colors">
                    Kontak
                </a>
            </nav>

            <div class="hidden lg:flex items-center gap-5">

                {{-- Dropdown bahasa --}}
                <div class="relative" @mouseenter="langOpen = true" @mouseleave="langOpen = false">
                    <button class="flex items-center gap-1 text-xs text-ink-soft hover:text-gold transition-colors font-body">
                        <span x-text="lang"></span>
                        <svg class="w-3 h-3 transition-transform" :class="langOpen && 'rotate-180'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        x-show="langOpen"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-cloak
                        class="absolute right-0 top-full mt-2 w-24 bg-white border border-ink/10 rounded-md shadow-xl overflow-hidden"
                    >
                        <button @click="lang = 'ID'" class="block w-full text-left px-4 py-2.5 text-xs text-forest hover:bg-cream hover:text-gold transition-colors">
                            Indonesia
                        </button>
                        <button @click="lang = 'EN'" class="block w-full text-left px-4 py-2.5 text-xs text-forest hover:bg-cream hover:text-gold transition-colors">
                            English
                        </button>
                    </div>
                </div>

                <a href="{{ url('/kontak') }}"
                    class="inline-flex items-center px-5 py-2.5 border border-forest text-white text-sm tracking-wide rounded-lg bg-forest transition-colors">
                        Hubungi Kami
                </a>
            </div>

            <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-forest p-2 -mr-2">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-cloak
        class="lg:hidden bg-white border-t border-ink/10"
    >
        <nav class="flex flex-col px-6 py-4 font-body text-sm">
            <a href="{{ url('/') }}" class="py-3 text-forest border-b border-ink/10">Beranda</a>
            <a href="{{ url('/proyek') }}" class="py-3 text-forest border-b border-ink/10">Proyek</a>
            <a href="{{ url('/tentang') }}" class="py-3 text-forest border-b border-ink/10">Tentang Kami</a>
            <a href="{{ url('/berita') }}" class="py-3 text-forest border-b border-ink/10">Berita</a>
            <a href="{{ url('/kontak') }}" class="py-3 text-forest">Kontak</a>
            <a href="{{ url('/kontak') }}"
               class="mt-4 inline-flex justify-center items-center px-5 py-3 border border-forest text-forest tracking-wide">
                Hubungi Kami
            </a>
        </nav>
    </div>
</header>

<div class="h-20"></div>