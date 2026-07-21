@extends('tailwind.layouts.app')

@section('title', $project->nama_projek)

@section('content')

    @php
        $imageGalleries = $project->galleries->where('is_video', false)->values();
        $isDummyGallery = $imageGalleries->isEmpty();

        if ($isDummyGallery) {
            $imageGalleries = collect(range(1, 5))->map(
                fn($i) => (object) [
                    'uuid' => $project->uuid . '-dummy-' . $i,
                    'gambar' => null,
                ],
            );
        }

        $videoGalleries = $project->galleries->where('is_video', true)->filter(fn($g) => $g->video_url)->values();
    @endphp

    @if ($project->logos->isNotEmpty())
        <section class="bg-cream py-8 overflow-hidden">
            <div class="flex gap-16 animate-marquee whitespace-nowrap">
                @foreach ($project->logos->concat($project->logos) as $logo)
                    <div class="shrink-0 flex items-center justify-center h-12">
                        <img src="{{ $logo->logo ? \Storage::url($logo->logo) : 'https://picsum.photos/seed/' . $logo->uuid . '/160/60' }}"
                            alt="{{ $logo->nama }}" class="h-20 w-auto object-contain opacity-80 grayscale">
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="relative h-[85vh] min-h-[560px]">
        <img src="{{ $project->cover ? \Storage::url($project->cover) : 'https://picsum.photos/seed/' . $project->uuid . '/1600/900' }}"
            alt="{{ $project->nama_projek }}" class="w-full h-full object-cover">
        <div class="absolute inset-0"></div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
            <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">{{ $project->developer }}</p>
            <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl text-ink leading-tight">
                {{ $project->nama_projek }}
            </h1>
            <p class="mt-6 text-ink-soft leading-relaxed">
                {{ $project->informasi }}
            </p>
        </div>
    </section>

    <section class="bg-cream py-24">
        <div class="max-w-6xl mx-auto px-6 lg:px-10">
            <div class="text-center mb-14" data-aos="fade-up">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Galeri</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Suasana {{ $project->nama_projek }}
                </h2>
            </div>

            <div class="relative rounded-3xl overflow-hidden shadow-lg aspect-[16/9]" data-aos="zoom-in"
                x-data="{ active: 0, total: {{ $imageGalleries->count() }} }" x-init="total > 1 && setInterval(() => active = (active + 1) % total, 3000)">
                @foreach ($imageGalleries as $i => $gallery)
                    <img src="{{ $gallery->gambar ? \Storage::url($gallery->gambar) : 'https://picsum.photos/seed/' . $gallery->uuid . '/1200/700' }}"
                        alt="{{ $project->nama_projek }} {{ $i + 1 }}"
                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
                        :class="active === {{ $i }} ? 'opacity-100' : 'opacity-0'">
                @endforeach

                @if ($imageGalleries->count() > 1)
                    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                        @foreach ($imageGalleries as $i => $gallery)
                            <button @click="active = {{ $i }}"
                                class="w-2.5 h-2.5 rounded-full transition-colors"
                                :class="active === {{ $i }} ? 'bg-gold' : 'bg-white/50'"
                                aria-label="Gambar {{ $i + 1 }}"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if ($videoGalleries->isNotEmpty())
        <section class="bg-white py-24" x-data="{
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
            <div class="max-w-6xl mx-auto px-6 lg:px-10">
                <div class="text-center mb-14" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Video</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Cuplikan {{ $project->nama_projek }}
                    </h2>
                </div>

                <div class="relative">
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Video sebelumnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Video berikutnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()"
                        class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($videoGalleries as $video)
                            <div class="w-full shrink-0 snap-start rounded-3xl overflow-hidden shadow-lg aspect-[16/9] bg-ink"
                                data-aos="fade-up">
                                <iframe src="{{ $video->embed_video_url }}" class="w-full h-full" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen loading="lazy"></iframe>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($project->fasilitas->isNotEmpty())
        <section class="bg-white py-24" x-data="{
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
            <div class="max-w-6xl mx-auto px-6 lg:px-10">
                <div class="text-center mb-14" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Fasilitas</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Fasilitas {{ $project->nama_projek }}
                    </h2>
                </div>

                <div class="relative">
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Fasilitas sebelumnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Fasilitas berikutnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()" @mouseenter="clearInterval(timer)"
                        @mouseleave="startAutoplay()"
                        class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($project->fasilitas as $item)
                            <div class="shrink-0 w-[80%] sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] snap-start"
                                data-aos="fade-up">
                                <div class="rounded-3xl overflow-hidden aspect-[4/3] bg-cream">
                                    <img src="{{ $item->gambar ? \Storage::url($item->gambar) : 'https://picsum.photos/seed/' . $item->uuid . '/600/450' }}"
                                        alt="{{ $item->title }}" class="w-full h-full object-cover">
                                </div>
                                <p class="mt-4 text-center font-display text-lg text-ink">
                                    {{ $item->title }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($project->lokasi)
        <section class="bg-cream py-24">
            <div class="max-w-6xl mx-auto px-6 lg:px-10">
                <div class="text-center mb-14" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Lokasi</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Peta Lokasi {{ $project->nama_projek }}
                    </h2>
                </div>

                <div class="rounded-3xl overflow-hidden shadow-lg [&_iframe]:w-full [&_iframe]:h-[450px] [&_iframe]:border-0"
                    data-aos="zoom-in">
                    {!! $project->lokasi !!}
                </div>
            </div>
        </section>
    @endif

    @include('tailwind.components.cta')

@endsection
