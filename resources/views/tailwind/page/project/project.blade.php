@extends('tailwind.layouts.app')

@section('title', $title)

@section('content')

    <section class="py-24 bg-forest text-stone">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
            <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Portofolio Kami</p>
            <h1 class="font-display text-4xl sm:text-5xl">
                {{ $title }}
            </h1>
            <p class="mt-5 text-stone/70 max-w-xl mx-auto leading-relaxed">
                Rangkaian proyek {{ strtolower($title) }} yang telah dan sedang dikembangkan
                oleh PT. Putra Sentosa Prakarsa.
            </p>
        </div>
    </section>

    @if ($projects->isNotEmpty())
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

                <div class="relative">
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

                    <div x-ref="track" @scroll.debounce.100ms="updateEdges()"
                        class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($projects as $project)
                            <a href="{{ route('frontend.project', $project->uuid) }}"
                                class="shrink-0 w-[80%] sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] snap-start
                                       bg-cream rounded-3xl overflow-hidden group"
                                data-aos="fade-up">
                                <div class="h-64 overflow-hidden">
                                    <img src="{{ $project->cover ? \Storage::url($project->cover) : 'https://picsum.photos/seed/' . $project->uuid . '/900/700' }}"
                                        alt="{{ $project->nama_projek }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                </div>
                                <div class="p-6">
                                    <p class="text-xs uppercase tracking-[0.15em] text-gold">
                                        {{ $project->developer }}
                                    </p>
                                    <h3 class="mt-2 font-display text-xl text-ink">
                                        {{ $project->nama_projek }}
                                    </h3>
                                    <p class="mt-2 text-sm text-ink-soft leading-relaxed line-clamp-3">
                                        {{ $project->informasi }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-24 bg-white text-center">
            <p class="text-ink-soft">Belum ada proyek untuk kategori ini.</p>
        </section>
    @endif

    @if (($mapProjects ?? collect())->isNotEmpty())
        <section class="py-24 bg-cream">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                    <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Sebaran Lokasi</p>
                    <h2 class="font-display text-3xl sm:text-4xl text-ink">
                        Lokasi {{ $title }}
                    </h2>
                </div>

                <div class="mt-14 rounded-3xl overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1200"
                    data-aos-easing="ease-out-cubic" data-aos-offset="120">
                    <x-leaflet-project-map :projects="$mapProjects" />
                </div>
            </div>
        </section>
    @endif

@endsection
