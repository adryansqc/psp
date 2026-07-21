@extends('tailwind.layouts.app')

@section('title', 'Kontak')

@section('content')

    @php
        $phoneRaw = $settingItems['phone_number']->value ?? '';
        $phoneClean = preg_replace('/[^0-9]/', '', $phoneRaw);

        if (str_starts_with($phoneClean, '0')) {
            $phoneClean = '62' . substr($phoneClean, 1);
        }

        $waLink = $phoneClean
            ? 'https://wa.me/' . $phoneClean . '?text=' . urlencode('Halo, saya ingin melakukan konsultasi.')
            : '#';
    @endphp

    <section class="py-24 bg-forest text-stone">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
            <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Hubungi Kami</p>
            <h1 class="font-display text-4xl sm:text-5xl">
                Kontak
            </h1>
            <p class="mt-5 text-stone/70 max-w-xl mx-auto leading-relaxed">
                Kami siap membantu menjawab pertanyaan Anda seputar proyek dan layanan
                PT. Putra Sentosa Prakarsa.
            </p>
        </div>
    </section>

    <section class="py-24 bg-cream">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="max-w-xl mx-auto text-center" data-aos="fade-up">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Office Location</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Kunjungi Lokasi Kami
                </h2>
            </div>

            <div class="mt-14 rounded-3xl overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1200"
                data-aos-easing="ease-out-cubic" data-aos-offset="120">
                <x-leaflet-project-map :projects="$mapProjects" />
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-2xl mx-auto px-6 lg:px-10">
            <div class="text-center mb-14" data-aos="fade-up">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">Business Hours</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Jam Operasional Kami
                </h2>
            </div>

            <ul class="divide-y divide-ink/10">
                <li class="flex items-center justify-between py-4" data-aos="fade-up" data-aos-delay="100">
                    <span class="text-ink">Senin - Jumat</span>
                    <span class="text-ink-soft">09:00 - 17:00</span>
                </li>
                <li class="flex items-center justify-between py-4" data-aos="fade-up" data-aos-delay="200">
                    <span class="text-ink">Sabtu</span>
                    <span class="text-ink-soft">09:00 - 14:00</span>
                </li>
                <li class="flex items-center justify-between py-4" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-ink">Minggu / Hari Libur Nasional</span>
                    <span class="text-ink-soft">Tutup</span>
                </li>
            </ul>
        </div>
    </section>

    <section class="py-24 bg-cream">
        <div class="max-w-3xl mx-auto px-6 lg:px-10">
            <div class="text-center mb-14" data-aos="fade-up">
                <p class="text-xs uppercase tracking-[0.25em] text-gold mb-3">FAQ</p>
                <h2 class="font-display text-3xl sm:text-4xl text-ink">
                    Pertanyaan yang Sering Diajukan
                </h2>
            </div>

            @if ($faqs->count())
                <div class="space-y-4">
                    @foreach ($faqs as $key => $faq)
                        <div class="bg-white rounded-2xl overflow-hidden" x-data="{ open: {{ $key === 0 ? 'true' : 'false' }} }" data-aos="fade-up"
                            data-aos-delay="{{ 100 + $key * 100 }}">
                            <button @click="open = !open"
                                class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left">
                                <span class="font-display text-lg text-ink">{{ $faq->question }}</span>
                                <svg class="w-5 h-5 text-gold shrink-0 transition-transform" :class="open && 'rotate-180'"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-collapse x-cloak class="px-6 pb-5">
                                <p class="text-ink-soft leading-relaxed">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-ink-soft" data-aos="fade-up">
                    Belum ada FAQ yang ditampilkan.
                </p>
            @endif
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 lg:px-10">
            <div class="bg-forest rounded-3xl px-8 py-16 text-center" data-aos="zoom-in" data-aos-duration="900"
                data-aos-easing="ease-out-cubic" data-aos-offset="120">
                <h3 class="font-display text-2xl sm:text-3xl text-stone mb-3" data-aos="fade-up">
                    Jadwalkan Konsultasi Bersama Kami
                </h3>
                <p class="text-stone/70 mb-8 max-w-md mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="150">
                    Tim kami siap membantu menjawab pertanyaan Anda dan memberikan panduan terbaik.
                </p>
                <a href="{{ $waLink }}" target="_blank"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-gold text-forest text-sm tracking-wide rounded-full hover:bg-gold-light transition-colors"
                    data-aos="zoom-in" data-aos-delay="300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.96 6.45 17.5 2 12.04 2Zm5.76 14.16c-.24.68-1.4 1.3-1.94 1.38-.5.08-1.12.11-1.81-.11-.42-.13-.95-.31-1.64-.6-2.88-1.24-4.76-4.14-4.9-4.33-.14-.19-1.17-1.56-1.17-2.98s.73-2.11 1-2.4c.24-.27.53-.34.7-.34h.5c.16 0 .38-.03.58.44.24.57.79 1.98.86 2.13.07.14.11.31.02.5-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.71 1.17 1.52 1.9 1.05.94 1.93 1.23 2.21 1.37.28.14.44.12.6-.07.16-.19.68-.79.87-1.06.19-.27.37-.22.62-.13.26.09 1.63.77 1.91.91.28.14.47.21.53.33.07.12.07.68-.17 1.36Z" />
                    </svg>
                    Schedule Consultation
                </a>
            </div>
        </div>
    </section>

@endsection
