@extends('tailwind.layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    @include('tailwind.page.beranda.slider-section')

    <section class="relative bg-white py-24 lg:py-32" id="proyek">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="grid lg:grid-cols-12 gap-y-2 lg:gap-x-16" x-data="{
                active: 'deskripsi_psp',
                panels: {
                    deskripsi_psp: { label: 'Deskripsi PSP', content: @js($aboutUs->deskripsi_psp ?? '<p>Belum ada data.</p>') },
                    history: { label: 'Sejarah', content: @js($aboutUs->history ?? '<p>Belum ada data.</p>') },
                    visi: { label: 'Visi', content: @js($aboutUs->visi ?? '<p>Belum ada data.</p>') },
                    nilai: { label: 'Nilai', content: @js($aboutUs->nilai ?? '<p>Belum ada data.</p>') },
                    our_project: { label: 'Proyek Kami', content: @js($aboutUs->our_project ?? '<p>Belum ada data.</p>') },
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

                                    <span
                                        class="relative w-9 h-9 rounded-full border flex items-center justify-center shrink-0 transition-colors"
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
                        <div x-show="active === key" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0">

                            <h3 class="font-display text-2xl sm:text-3xl text-forest mb-6" x-text="panel.label"></h3>

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
