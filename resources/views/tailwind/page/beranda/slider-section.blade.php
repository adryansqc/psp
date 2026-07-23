@if ($sliders->isNotEmpty())
    <section
        class="relative aspect-video sm:aspect-auto sm:h-[90vh] sm:min-h-[560px] flex items-center overflow-hidden bg-forest"
        x-data='{ slides: @json($sliders), active: 0 }'
        x-init="if (slides && slides.length) setInterval(() => active = (active + 1) % slides.length, 6000)">
        <template x-for="(slide, index) in slides" :key="'slide-' + index">
            <div class="absolute inset-0 bg-forest"
                :class="active === index ?
                    'transition-[clip-path,opacity] duration-[1000ms] ease-out opacity-100 [clip-path:inset(0%)]' :
                    'opacity-0 [clip-path:inset(40%)] pointer-events-none'">
                <img :src="'/storage/' + slide.gambar" :alt="slide.second_title"
                    class="w-full h-full object-contain sm:object-cover object-center">
                <div class="absolute inset-0"></div>
            </div>
        </template>

        <div class="hidden sm:block relative max-w-7xl px-2 lg:px-10 text-stone z-10" data-aos="fade-up" x-data="{ lang: localStorage.getItem('preferred_lang') === 'en' ? 'EN' : 'ID' }">
            <p class="font-display text-4xl lg:text-6xl leading-tight max-w-2xl"translate="no"
            x-text="lang === 'EN' ? 'Find a property you’ll love' : 'Temukan properti yang anda cintai'">
            </p>
            <a href="#proyek"
                class="mt-4 inline-flex items-center px-7 py-3 bg-gold text-forest rounded-lg text-sm tracking-wide hover:bg-gold-light transition-colors">
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
    <section
        class="relative aspect-video sm:aspect-auto sm:h-[90vh] sm:min-h-[560px] flex items-center overflow-hidden bg-forest">
        <div class="absolute inset-0">
            <img src="https://picsum.photos/seed/psp-fallback/1600/1000" alt="PT. Putra Sentosa Prakarsa"
                class="w-full h-full object-contain sm:object-cover object-center opacity-80">
        </div>
        <div class="absolute inset-0 bg-forest/60"></div>

        <div class="hidden sm:block relative max-w-7xl mx-auto px-6 lg:px-10 text-stone">
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

<div class="sm:hidden bg-white text-gold px-6 py-8 text-left" data-aos="fade-up" x-data="{ lang: localStorage.getItem('preferred_lang') === 'en' ? 'EN' : 'ID' }">
    <p class="text-forest leading-relaxed text-3xl font-bold font-display" translate="no"
    x-text="lang === 'EN' ? 'Find a property you’ll love' : 'Temukan properti yang anda cintai'">
    </p>
    <a href="#proyek"
        class="mt-5 inline-flex items-center px-7 py-3 bg-gold text-forest rounded-lg text-sm tracking-wide hover:bg-gold-light transition-colors">
        Pelajari Lebih Lanjut
    </a>
</div>