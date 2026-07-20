@extends('tailwind.layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    @if ($sliders->isNotEmpty())
        <section class="relative h-[90vh] min-h-[560px] flex items-center overflow-hidden bg-white"
            x-data='{ slides: @json($sliders), active: 0 }' x-init="if (slides && slides.length) setInterval(() => active = (active + 1) % slides.length, 6000)">
            <template x-for="(slide, index) in slides" :key="'slide-' + index">
                <div class="absolute inset-0"
                    :class="active === index ?
                        'transition-[clip-path,opacity] duration-[1000ms] ease-out opacity-100 [clip-path:inset(0%)]' :
                        'opacity-0 [clip-path:inset(40%)] pointer-events-none'">
                    <img :src="'/storage/' + slide.gambar" :alt="slide.second_title" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-forest/60"></div>
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
                    class="mt-8 inline-flex items-center px-7 py-3 bg-gold text-forest text-sm tracking-wide hover:bg-gold-light transition-colors">
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
                    class="w-full h-full object-cover opacity-60">
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

    <section class="relative bg-white py-24 lg:py-32" id="proyek">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="grid lg:grid-cols-12 gap-y-2 lg:gap-x-16"
                x-data="{
                    active: 'deskripsi_psp',
                    panels: {
                        deskripsi_psp: { label: 'Deskripsi PSP', content: @js($aboutUs->deskripsi_psp ?? '<p>Belum ada data.</p>') },
                        history:       { label: 'Sejarah',       content: @js($aboutUs->history ?? '<p>Belum ada data.</p>') },
                        visi:          { label: 'Visi',          content: @js($aboutUs->visi ?? '<p>Belum ada data.</p>') },
                        nilai:         { label: 'Nilai',         content: @js($aboutUs->nilai ?? '<p>Belum ada data.</p>') },
                        our_project:   { label: 'Proyek Kami',   content: @js($aboutUs->our_project ?? '<p>Belum ada data.</p>') },
                    }
                }">

                <nav class="lg:col-span-4">
                    <ul class="border-t border-ink/10">
                        <template x-for="(panel, key) in panels" :key="key">
                            <li class="border-b border-ink/10">
                                <button type="button" @click="active = key"
                                    class="w-full flex items-center justify-between gap-4 py-5 text-left group cursor-pointer">
                                    <span class="font-display text-lg sm:text-xl transition-colors"
                                        :class="active === key ? 'text-forest' : 'text-ink-soft group-hover:text-ink'"
                                        x-text="panel.label"></span>

                                    <span class="relative w-9 h-9 rounded-full border flex items-center justify-center shrink-0 transition-colors"
                                        :class="active === key ? 'border-gold bg-gold/10' : 'border-ink/15'">
                                        <span class="absolute w-3.5 h-px transition-colors"
                                            :class="active === key ? 'bg-forest' : 'bg-ink-soft'"></span>
                                        <span class="absolute w-px h-3.5 transition-transform duration-300 origin-center"
                                            :class="active === key ? 'bg-forest scale-y-0' : 'bg-ink-soft'"></span>
                                    </span>
                                </button>
                            </li>
                        </template>
                    </ul>
                </nav>

                <div class="lg:col-span-8 relative mt-10 lg:mt-0 min-h-[240px]">
                    <template x-for="(panel, key) in panels" :key="'panel-' + key">
                        {{-- <div x-show="active === key"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0">

                            <h3 class="font-display text-2xl sm:text-3xl text-forest mb-6"
                                x-text="panel.label"></h3>

                            <div class="prose prose-neutral max-w-none text-ink-soft leading-relaxed
                                    prose-headings:font-display prose-headings:text-forest
                                    prose-a:text-gold prose-strong:text-ink"
                                x-html="panel.content"></div>
                        </div> --}}
                        <div x-show="active === key"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0">

                            <h3 class="font-display text-2xl sm:text-3xl text-forest mb-6"
                                x-text="panel.label"></h3>

                            <div class="rich-content" x-html="panel.content"></div>
                        </div>
                    </template>
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
