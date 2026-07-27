@extends('tailwind.layouts.app')

@section('title', 'Berita & Acara')

@section('content')

    @php
        $daftarBerita = $beritas->where('tipe', 'berita')->values();
        $daftarAcara = $beritas->where('tipe', 'acara')->values();
    @endphp

    <section class="py-24 bg-forest text-stone">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up" x-data="{ lang: localStorage.getItem('preferred_lang') === 'en' ? 'EN' : 'ID' }">
            <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3" translate="no"
                x-text="lang === 'EN' ? 'Latest Updates' : 'Informasi Terbaru'">
            </p>
            <h1 class="font-display text-4xl sm:text-5xl" translate="no"
                x-text="lang === 'EN' ? 'News & Events' : 'Berita & Acara'">
            </h1>
            <p class="mt-5 text-stone/70 max-w-xl mx-auto leading-relaxed" translate="no"
                x-text="lang === 'EN'
                ? 'Follow the latest updates and events held by PT. Putra Sentosa Prakarsa.'
                : 'Ikuti perkembangan terbaru dan acara yang diselenggarakan oleh PT. Putra Sentosa Prakarsa.'">
            </p>
        </div>
    </section>

    {{-- ================= BERITA ================= --}}
    @if ($daftarBerita->isNotEmpty())
        <section class="py-24 bg-white" x-data="{
            atStart: true,
            atEnd: false,
            updateEdges() {
                const el = $refs.track;
                this.atStart = el.scrollLeft <= 4;
                this.atEnd = el.scrollLeft >= el.scrollWidth - el.clientWidth - 4;
            },
            scroll(direction) {
                const el = $refs.track;
                const card = el.querySelector(':scope > *');
                const gap = 32;
                const amount = card ? card.offsetWidth + gap : el.clientWidth;

                if (direction === 1 && this.atEnd) {
                    el.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    el.scrollBy({ left: direction * amount, behavior: 'smooth' });
                }
            }
        }" x-init="updateEdges()">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Berita</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Kabar Terbaru dari PT. Putra Sentosa Prakarsa
                    </h2>
                </div>

                <div class="relative mt-16">
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="flex absolute -left-3 sm:left-0 top-86 sm:top-1/2 -translate-y-1/2 sm:-translate-x-14 z-10 w-9 h-9 sm:w-11 sm:h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Proyek sebelumnya">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="flex absolute -right-3 sm:right-0 top-86 sm:top-1/2 -translate-y-1/2 sm:translate-x-14 z-10 w-9 h-9 sm:w-11 sm:h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Proyek berikutnya">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()"
                        class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($daftarBerita as $i => $berita)
                            <div class="w-full shrink-0 snap-start bg-cream rounded-3xl overflow-hidden" data-aos="fade-up">
                                <div class="grid md:grid-cols-2">
                                    <div class="h-72 md:h-auto">
                                        <img src="{{ $berita->cover ? \Storage::url($berita->cover) : 'https://picsum.photos/seed/' . $berita->uuid . '/1000/800' }}"
                                            alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 md:p-12 flex flex-col justify-center">
                                        <p class="text-xs uppercase tracking-[0.15em] text-gold">
                                            {{ $berita->created_at->translatedFormat('d F Y') }}
                                        </p>
                                        <h3 class="mt-3 font-display text-2xl md:text-3xl text-ink">
                                            {{ $berita->judul }}
                                        </h3>
                                        <div class="mt-4 text-sm text-ink-soft leading-relaxed max-w-none [&_p]:mb-3">
                                            {!! $berita->konten !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-24 bg-white" x-data="{ lang: localStorage.getItem('preferred_lang') === 'en' ? 'EN' : 'ID' }">
            <div class="max-w-xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-cream mb-6">
                    <svg class="w-8 h-8 text-ink-soft" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </div>
                <h2 class="font-display text-2xl text-ink" translate="no"
                    x-text="lang === 'EN' ? 'No news yet' : 'Belum Ada Berita'">
                </h2>
                <p class="mt-3 text-ink-soft leading-relaxed" translate="no"
                    x-text="lang === 'EN'
                        ? 'Please check back later for the latest news from PT. Putra Sentosa Prakarsa.'
                        : 'Silakan cek kembali nanti untuk berita terbaru dari PT. Putra Sentosa Prakarsa.'">
                </p>
            </div>
        </section>
    @endif

    {{-- ================= ACARA ================= --}}
    @if ($daftarAcara->isNotEmpty())
        <section class="py-24 bg-cream" x-data="{
            atStart: true,
            atEnd: false,
            updateEdges() {
                const el = $refs.track;
                this.atStart = el.scrollLeft <= 4;
                this.atEnd = el.scrollLeft >= el.scrollWidth - el.clientWidth - 4;
            },
            scroll(direction) {
                const el = $refs.track;
                const card = el.querySelector(':scope > *');
                const gap = 32;
                const amount = card ? card.offsetWidth + gap : el.clientWidth;

                if (direction === 1 && this.atEnd) {
                    el.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    el.scrollBy({ left: direction * amount, behavior: 'smooth' });
                }
            }
        }" x-init="updateEdges()">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Acara</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Acara yang Diselenggarakan PSP
                    </h2>
                </div>

                <div class="relative mt-16">
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="flex absolute -left-3 sm:left-0 top-86 sm:top-1/2 -translate-y-1/2 sm:-translate-x-14 z-10 w-9 h-9 sm:w-11 sm:h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Proyek sebelumnya">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="flex absolute -right-3 sm:right-0 top-86 sm:top-1/2 -translate-y-1/2 sm:translate-x-14 z-10 w-9 h-9 sm:w-11 sm:h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Proyek berikutnya">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()"
                        class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($daftarAcara as $i => $acara)
                            <div class="w-full shrink-0 snap-start bg-white rounded-3xl overflow-hidden" data-aos="fade-up">
                                <div class="grid md:grid-cols-2">
                                    <div class="h-72 md:h-auto">
                                        <img src="{{ $acara->cover ? \Storage::url($acara->cover) : 'https://picsum.photos/seed/' . $acara->uuid . '/1000/800' }}"
                                            alt="{{ $acara->judul }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 md:p-12 flex flex-col justify-center">
                                        <p class="text-xs uppercase tracking-[0.15em] text-gold">
                                            {{ $acara->created_at->translatedFormat('d F Y') }}
                                        </p>
                                        <h3 class="mt-3 font-display text-2xl md:text-3xl text-ink">
                                            {{ $acara->judul }}
                                        </h3>
                                        <div class="mt-4 text-sm text-ink-soft leading-relaxed max-w-none [&_p]:mb-3">
                                            {!! $acara->konten !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-24 bg-cream" x-data="{ lang: localStorage.getItem('preferred_lang') === 'en' ? 'EN' : 'ID' }">
            <div class="max-w-xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white mb-6">
                    <svg class="w-8 h-8 text-ink-soft" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                </div>
                <h2 class="font-display text-2xl text-ink" translate="no"
                    x-text="lang === 'EN' ? 'No events yet' : 'Belum Ada Acara'">
                </h2>
                <p class="mt-3 text-ink-soft leading-relaxed" translate="no"
                    x-text="lang === 'EN'
                        ? 'Please check back later for upcoming events from PT. Putra Sentosa Prakarsa.'
                        : 'Silakan cek kembali nanti untuk acara terbaru dari PT. Putra Sentosa Prakarsa.'">
                </p>
            </div>
        </section>
    @endif

@endsection