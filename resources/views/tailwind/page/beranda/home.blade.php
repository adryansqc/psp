@extends('tailwind.layouts.app')

@section('title', 'Beranda')

@section('content')

    @if ($sliders->isNotEmpty())
        <section class="relative h-[90vh] min-h-[560px] flex items-center overflow-hidden bg-white"
            x-data='{ slides: @json($sliders), active: 0 }' x-init="if (slides && slides.length) setInterval(() => active = (active + 1) % slides.length, 6000)">
            <template x-for="(slide, index) in slides" :key="'slide-' + index">
                <div class="absolute inset-0"
                    :class="active === index ?
                        'transition-[clip-path,opacity] duration-[1000ms] ease-out opacity-100 [clip-path:inset(0%)]' :
                        'opacity-0 [clip-path:inset(40%)] pointer-events-none'">
                    <img :src="'/storage/' + slide.gambar" :alt="slide.second_title"
                        class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0"></div>
                </div>
            </template>
            <div class="relative max-w-7xl mx-auto px-6 lg:px-10 text-stone z-10">
                <div class="relative min-h-[170px] sm:min-h-[190px]">
                    <template x-for="(slide, index) in slides" :key="'text-' + index">
                        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
                            :class="active === index ? 'opacity-100' : 'opacity-0 pointer-events-none'">
                            <p class="text-xs uppercase tracking-[0.25em] text-gold mb-4" x-text="slide.second_title"></p>
                            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl leading-tight max-w-2xl"
                                style="white-space: pre-line" x-text="slide.title"></h1>
                        </div>
                    </template>
                </div>

                <p class="mt-6 text-stone/80 max-w-lg leading-relaxed">
                    Membangun kawasan hunian dan komersial di Jambi dengan perencanaan matang
                    dan kualitas yang bisa dipercaya.
                </p>
                <a href="#proyek"
                    class="mt-8 inline-flex items-center px-7 py-3 bg-gold text-forest rounded-lg text-sm tracking-wide hover:bg-gold-light transition-colors">
                    Pelajari Lebih Lanjut
                </a>
            </div>

            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                <template x-for="(slide, index) in slides" :key="'dot-' + index">
                    <button @click="active = index" aria-label="Pindah slide"
                        class="w-2.5 h-2.5 rounded-full transition-colors"
                        :class="active === index ? 'bg-gold' : 'bg-stone/40'"></button>
                </template>
            </div>
        </section>
    @else
        <section class="relative h-[90vh] min-h-[560px] flex items-center overflow-hidden bg-forest">
            <div class="absolute inset-0">
                <img src="https://picsum.photos/seed/psp-fallback/1600/1000" alt="PT. Putra Sentosa Prakarsa"
                    class="w-full h-full object-cover object-center opacity-80">
            </div>
            <div class="absolute inset-0 bg-forest/60"></div>

            <div class="relative max-w-7xl mx-auto px-6 lg:px-10 text-stone">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-4">
                    PT. Putra Sentosa Prakarsa
                </p>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl leading-tight max-w-2xl">
                    Temukan hunian yang Anda cintai
                </h1>
                <p class="mt-6 text-stone/80 max-w-lg leading-relaxed">
                    Membangun kawasan hunian dan komersial di Jambi dengan perencanaan matang
                    dan kualitas yang bisa dipercaya.
                </p>
                <a href="#proyek"
                    class="mt-8 inline-flex items-center px-7 py-3 bg-gold text-forest text-sm tracking-wide hover:bg-gold-light transition-colors">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </section>
    @endif

    <section class="py-0 bg-white mt-0">
        <div class="max-w-5xl mx-auto px-6 lg:px-10">
            <div class="mt-0 rounded-3xl aspect-video w-full overflow-hidden shadow-2xl" data-aos="fade-up"
                data-aos-delay="100">
                <iframe class="w-full h-full" src="https://www.youtube-nocookie.com/embed/3imCL4Bk83c"
                    title="Profil PT. Putra Sentosa Prakarsa" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section id="proyek" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Proyek Utama</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Proyek Utama dari PT. Putra Sentosa Prakarsa
                </h2>
            </div>

            @if ($pinnedProjects->isNotEmpty())

                <div class="relative mt-16" x-data="{
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
                        const amount = card ? card.offsetWidth + gap : el.clientWidth * 0.8;

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
                    <button @click="scroll(-1)" :disabled="atStart"
                        class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                        aria-label="Proyek sebelumnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="scroll(1)"
                        class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                        aria-label="Proyek berikutnya">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()" @mouseenter="clearInterval(timer)"
                        @mouseleave="startAutoplay()"
                        class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($pinnedProjects as $i => $project)
                            <a href="#"
                                class="group block shrink-0 w-[80%] sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] snap-start"
                                data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                                <div class="overflow-hidden">
                                    <img src="{{ $project->cover ? \Storage::url($project->cover) : 'https://picsum.photos/seed/' . $project->uuid . '/800/600' }}"
                                        alt="{{ $project->nama_projek }}"
                                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <p class="mt-4 text-xs uppercase tracking-[0.15em] text-gold">
                                    {{ $project->developer }}
                                </p>
                                <h3
                                    class="mt-1 font-display text-xl text-ink group-hover:text-forest-light transition-colors">
                                    {{ $project->nama_projek }}
                                </h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div
                    class="mt-16 flex flex-col items-center justify-center py-16 border border-dashed border-ink/15 rounded-3xl">
                    <svg class="w-10 h-10 text-ink-soft/40 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7l9-4 9 4-9 4-9-4zm0 0v10l9 4m0-14v14m9-14v10l-9 4" />
                    </svg>
                    <p class="text-ink-soft text-sm">Belum ada proyek yang ditampilkan saat ini.</p>
                </div>

            @endif
        </div>
    </section>

    <section id="news" class="py-24 bg-white" x-data="{
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
            const gap = 32; // sama dengan gap-8 (2rem)
            const amount = card ? card.offsetWidth + gap : el.clientWidth * 0.8;

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
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">News dan Event</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Berita dan Event PT. Putra Sentosa Prakarsa
                </h2>
            </div>

            <div class="relative mt-16">
                <button @click="scroll(-1)" :disabled="atStart"
                    class="hidden sm:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light disabled:opacity-30 disabled:pointer-events-none"
                    aria-label="Proyek sebelumnya">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button @click="scroll(1)"
                    class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-14 z-10 w-11 h-11 items-center justify-center rounded-full bg-forest text-white shadow-md transition-colors hover:bg-forest-light"
                    aria-label="Proyek berikutnya">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div x-ref="track" @scroll.debounce.100ms="updateEdges()" @mouseenter="clearInterval(timer)"
                    @mouseleave="startAutoplay()"
                    class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    @foreach ($beritas as $i => $berita)
                        <a href="#"
                            class="group block shrink-0 w-[80%] sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] snap-start
                                        bg-cream rounded-3xl p-5"
                            data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                            <div class="overflow-hidden rounded-2xl">
                                <img src="{{ $berita->cover ? \Storage::url($berita->cover) : 'https://picsum.photos/seed/' . $berita->uuid . '/1000/800' }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-full h-48 object-cover rounded-2xl group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="pt-5">
                                <p class="text-xs uppercase tracking-[0.15em] text-gold">
                                    {{ $berita->created_at->translatedFormat('d F Y') }}
                                </p>
                                <h3
                                    class="mt-2 font-display text-xl text-ink group-hover:text-forest-light transition-colors">
                                    {{ $berita->judul }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Sebaran Lokasi</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Lokasi Proyek PT. Putra Sentosa Prakarsa
                </h2>
            </div>

            <div class="mt-14 rounded-3xl overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1200"
                data-aos-easing="ease-out-cubic" data-aos-offset="120">
                <x-leaflet-project-map :projects="$mapProjects" />
            </div>
        </div>
    </section>

    @include('tailwind.components.cta')
@endsection
