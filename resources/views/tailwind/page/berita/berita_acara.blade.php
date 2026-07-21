@extends('tailwind.layouts.app')

@section('title', 'Berita & Acara')

@section('content')

    @php
        $daftarBerita = $beritas->where('tipe', 'berita')->values();
        $daftarAcara = $beritas->where('tipe', 'acara')->values();
    @endphp

    <section class="py-24 bg-forest text-stone">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
            <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Informasi Terbaru</p>
            <h1 class="font-display text-4xl sm:text-5xl">
                Berita &amp; Acara
            </h1>
            <p class="mt-5 text-stone/70 max-w-xl mx-auto leading-relaxed">
                Ikuti perkembangan terbaru dan acara yang diselenggarakan oleh
                PT. Putra Sentosa Prakarsa.
            </p>
        </div>
    </section>

    @if ($daftarBerita->isNotEmpty())
        <section class="py-24 bg-white" x-data="{
            atStart: true,
            atEnd: false,
            timer: null,
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
            },
            startAutoplay() {
                this.timer = setInterval(() => this.scroll(1), 3000);
            }
        }" x-init="updateEdges();
        startAutoplay()">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Berita</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Kabar Terbaru dari PT. Putra Sentosa Prakarsa
                    </h2>
                </div>

                <div class="relative mt-16">
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Berita sebelumnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Berita berikutnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()" @mouseenter="clearInterval(timer)"
                        @mouseleave="startAutoplay()"
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
    @endif


    @if ($daftarAcara->isNotEmpty())
        <section class="py-24 bg-cream" x-data="{
            atStart: true,
            atEnd: false,
            timer: null,
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
            },
            startAutoplay() {
                this.timer = setInterval(() => this.scroll(1), 3000);
            }
        }" x-init="updateEdges();
        startAutoplay()">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Acara</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Acara yang Diselenggarakan PSP
                    </h2>
                </div>

                <div class="relative mt-16">
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Acara sebelumnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Acara berikutnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()" @mouseenter="clearInterval(timer)"
                        @mouseleave="startAutoplay()"
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
    @endif

@endsection
