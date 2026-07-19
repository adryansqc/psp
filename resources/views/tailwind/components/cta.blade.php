<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
        <h2 class="font-display text-3xl sm:text-4xl text-ink">
            Siap mewujudkan hunian impian Anda bersama PSP?
        </h2>
        <p class="mt-5 text-ink-soft max-w-xl mx-auto leading-relaxed">
            Tim kami siap membantu menjawab pertanyaan seputar proyek, ketersediaan unit,
            hingga jadwal kunjungan lokasi.
        </p>

        <p class="text-xs uppercase tracking-[0.25em] text-gold mt-5">Hubungi Kami</p>
        <div class="mt-5 flex flex-col sm:flex-row items-center justify-center gap-6 sm:gap-10">
            <a href="mailto:{{ $settingItems['email']->value ?? '' }}"
               class="flex items-center gap-3 text-ink hover:text-gold transition-colors">
                <svg class="w-5 h-5 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>{{ $settingItems['email']->value ?? 'Email Perusahaan' }}</span>
            </a>

            <a href="tel:{{ $settingItems['phone_number']->value ?? '' }}"
               class="flex items-center gap-3 text-ink hover:text-gold transition-colors">
                <svg class="w-5 h-5 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>{{ $settingItems['phone_number']->value ?? 'No. Tlp' }}</span>
            </a>
        </div>

        <a href="{{ url('/kontak') }}"
           class="mt-10 inline-flex items-center px-8 py-3.5 bg-forest text-white text-sm tracking-wide rounded-full hover:bg-forest-light transition-colors">
            Hubungi Kami Sekarang
        </a>
    </div>
</section>