<header x-data="{ mobileOpen: false, projectsOpen: false, mobileProjectsOpen: false, langOpen: false, lang: 'ID', scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40)" :class="scrolled && 'shadow-md'"
    class="fixed top-0 inset-x-0 z-50 bg-white border-b border-ink/5 transition-shadow duration-300">
    <div class="w-full px-6 lg:px-10">
        <div class="flex items-center h-20">

            <a href="{{ url('/') }}"
                class="flex items-center gap-2 shrink-0 border border-forest/15 rounded-full pl-2 pr-4 py-1.5">
                <img src="{{ asset('dummypsp') }}/assets/images/Logo_psp.png" alt="Logo PSP"
                    class="h-8 w-8 object-contain">
                <span class="font-display text-2xl tracking-wide text-forest">PSP</span>
                <span class="hidden sm:inline text-[11px] uppercase tracking-[0.2em] text-forest-light self-end mb-1">
                    Putra Sentosa Prakarsa
                </span>
            </a>

            <div class="hidden lg:flex items-center gap-10 ml-auto">

                <nav class="flex items-center gap-10 font-body text-sm">
                    <a href="{{ url('/') }}"
                        class="relative pb-1 transition-colors {{ request()->is('/') ? 'text-gold' : 'text-forest hover:text-gold' }}">
                        Beranda
                        @if (request()->is('/'))
                            <span class="absolute left-0 -bottom-1 w-full h-px bg-gold"></span>
                        @endif
                    </a>

                    <a href="{{ route('frontend.about') }}"
                        class="relative pb-1 transition-colors {{ request()->routeIs('frontend.about') ? 'text-gold' : 'text-forest hover:text-gold' }}">
                        Tentang Kami
                        @if (request()->routeIs('frontend.about'))
                            <span class="absolute left-0 -bottom-1 w-full h-px bg-gold"></span>
                        @endif
                    </a>

                    <div class="relative" @mouseenter="projectsOpen = true" @mouseleave="projectsOpen = false">
                        <button
                            class="relative pb-1 flex items-center gap-1 transition-colors {{ request()->is('proyek*') ? 'text-gold' : 'text-forest hover:text-gold' }}">
                            Proyek
                            <svg class="w-3.5 h-3.5 transition-transform" :class="projectsOpen && 'rotate-180'"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                            @if (request()->is('proyek*'))
                                <span class="absolute left-0 -bottom-1 w-full h-px bg-gold"></span>
                            @endif
                        </button>

                        <div x-show="projectsOpen" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0" x-cloak
                            class="absolute left-0 top-full w-64 pt-2">
                            <div class="bg-white border border-ink/10 rounded-md shadow-xl overflow-hidden">
                                <a href="{{ url('/proyek') }}"
                                    class="block px-5 py-3 text-sm transition-colors {{ request()->is('proyek') && !request('tipe') ? 'text-gold bg-cream' : 'text-forest hover:bg-cream hover:text-gold' }}">
                                    Semua Proyek
                                </a>
                                <a href="{{ url('/proyek?tipe=residensial') }}"
                                    class="block px-5 py-3 text-sm transition-colors {{ request('tipe') === 'residensial' ? 'text-gold bg-cream' : 'text-forest hover:bg-cream hover:text-gold' }}">
                                    Residensial
                                </a>
                                <a href="{{ url('/proyek?tipe=komersial') }}"
                                    class="block px-5 py-3 text-sm transition-colors {{ request('tipe') === 'komersial' ? 'text-gold bg-cream' : 'text-forest hover:bg-cream hover:text-gold' }}">
                                    Komersial
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('frontend.allBerita') }}"
                        class="relative pb-1 transition-colors {{ request()->is('berita*') ? 'text-gold' : 'text-forest hover:text-gold' }}">
                        Berita & Acara
                        @if (request()->is('berita*'))
                            <span class="absolute left-0 -bottom-1 w-full h-px bg-gold"></span>
                        @endif
                    </a>

                    <a href="{{ url('/kontak') }}"
                        class="relative pb-1 transition-colors {{ request()->is('kontak*') ? 'text-gold' : 'text-forest hover:text-gold' }}">
                        Kontak
                        @if (request()->is('kontak*'))
                            <span class="absolute left-0 -bottom-1 w-full h-px bg-gold"></span>
                        @endif
                    </a>
                </nav>

                <div class="flex items-center gap-5">

                    <div class="relative" @mouseenter="langOpen = true" @mouseleave="langOpen = false">
                        <button
                            class="flex items-center gap-1 text-xs text-ink-soft hover:text-gold transition-colors font-body">
                            <span x-text="lang"></span>
                            <svg class="w-3 h-3 transition-transform" :class="langOpen && 'rotate-180'" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="langOpen" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0" x-cloak
                            class="absolute right-0 top-full w-24 pt-2">
                            <div class="bg-white border border-ink/10 rounded-md shadow-xl overflow-hidden">
                                <button @click="lang = 'ID'"
                                    class="block w-full text-left px-4 py-2.5 text-xs text-forest hover:bg-cream hover:text-gold transition-colors">
                                    Indonesia
                                </button>
                                <button @click="lang = 'EN'"
                                    class="block w-full text-left px-4 py-2.5 text-xs text-forest hover:bg-cream hover:text-gold transition-colors">
                                    English
                                </button>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/kontak') }}"
                        class="inline-flex items-center px-5 py-2.5 border border-forest text-white text-sm tracking-wide rounded-lg bg-forest transition-colors">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-forest p-2 -mr-2 ml-auto">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-cloak
        class="lg:hidden bg-white border-t border-ink/10">
        <nav class="flex flex-col px-6 py-4 font-body text-sm">
            <a href="{{ url('/') }}"
                class="py-3 border-b border-ink/10 {{ request()->is('/') ? 'text-gold font-medium' : 'text-forest' }}">
                Beranda
            </a>
            <a href="{{ route('frontend.about') }}"
                class="py-3 border-b border-ink/10 {{ request()->routeIs('frontend.about') ? 'text-gold font-medium' : 'text-forest' }}">
                Tentang Kami
            </a>


            <div class="border-b border-ink/10">
                <button @click="mobileProjectsOpen = !mobileProjectsOpen"
                    class="w-full flex items-center justify-between py-3 {{ request()->is('proyek*') ? 'text-gold font-medium' : 'text-forest' }}">
                    Proyek
                    <svg class="w-4 h-4 transition-transform" :class="mobileProjectsOpen && 'rotate-180'"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="mobileProjectsOpen" x-cloak class="pb-3 pl-4 flex flex-col gap-1">
                    <a href="{{ url('/proyek') }}"
                        class="py-2 text-sm {{ request()->is('proyek') && !request('tipe') ? 'text-gold font-medium' : 'text-forest/80' }}">
                        Semua Proyek
                    </a>
                    <a href="{{ url('/proyek?tipe=residensial') }}"
                        class="py-2 text-sm {{ request('tipe') === 'residensial' ? 'text-gold font-medium' : 'text-forest/80' }}">
                        Residensial
                    </a>
                    <a href="{{ url('/proyek?tipe=komersial') }}"
                        class="py-2 text-sm {{ request('tipe') === 'komersial' ? 'text-gold font-medium' : 'text-forest/80' }}">
                        Komersial
                    </a>
                </div>
            </div>

            <a href="{{ route('frontend.allBerita') }}"
                class="py-3 border-b border-ink/10 {{ request()->is('berita*') ? 'text-gold font-medium' : 'text-forest' }}">
                Berita & Acara
            </a>
            <a href="{{ url('/kontak') }}"
                class="py-3 border-b border-ink/10 {{ request()->is('kontak*') ? 'text-gold font-medium' : 'text-forest' }}">
                Kontak
            </a>

            <div class="flex items-center gap-3 py-4">
                <span class="text-xs uppercase tracking-[0.15em] text-ink-soft">Bahasa:</span>
                <button @click="lang = 'ID'" class="text-sm"
                    :class="lang === 'ID' ? 'text-gold font-medium' : 'text-forest/70'">
                    Indonesia
                </button>
                <span class="text-ink-soft/40">/</span>
                <button @click="lang = 'EN'" class="text-sm"
                    :class="lang === 'EN' ? 'text-gold font-medium' : 'text-forest/70'">
                    English
                </button>
            </div>

            <a href="{{ url('/kontak') }}"
                class="mt-2 inline-flex justify-center items-center px-5 py-3 border border-forest text-forest tracking-wide">
                Hubungi Kami
            </a>
        </nav>
    </div>
</header>

<div class="h-20"></div>
