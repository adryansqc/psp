<footer class="bg-forest text-stone font-body">
    <div class="border-t border-gold/40"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-10">

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Korporasi</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ route('frontend.about') }}" class="hover:text-gold transition-colors">Tentang Kami</a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Proyek</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ route('frontend.project.residensial') }}"
                        class="hover:text-gold transition-colors">Resedensial</a></li>
                <li><a href="{{ route('frontend.project.commercial') }}"
                        class="hover:text-gold transition-colors">Commercial Area</a></li>
                <li><a href="{{ route('frontend.project.hotel') }}" class="hover:text-gold transition-colors">Hotel &
                        Resort</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Berita & Acara</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ route('frontend.allBerita') }}" class="hover:text-gold transition-colors">Semua
                        Berita</a></li>
                <li><a href="{{ route('frontend.allBerita') }}" class="hover:text-gold transition-colors">Acara
                        Terbaru</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Hubungi Kami</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ route('frontend.contact') }}" class="hover:text-gold transition-colors">Hubungi Kami</a>
                </li>
                @php
                    $phoneRaw = $settingItems['phone_number']->value ?? '';
                    $phoneClean = preg_replace('/[^0-9]/', '', $phoneRaw);

                    if (str_starts_with($phoneClean, '0')) {
                        $phoneClean = '62' . substr($phoneClean, 1);
                    }

                    $waLink = $phoneClean ? 'https://wa.me/' . $phoneClean : '#';
                @endphp

                <li>
                    <a href="mailto:{{ $settingItems['email']->value ?? '' }}"
                        class="hover:text-gold transition-colors">
                        {{ $settingItems['email']->value ?? 'Email Perusahaan' }}
                    </a>
                </li>
                <li>
                    <a href="{{ $waLink }}" target="_blank" rel="noopener"
                        class="hover:text-gold transition-colors">
                        {{ $settingItems['phone_number']->value ?? 'No. Tlp' }}
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Ikuti Kami</h3>
            <div class="flex items-center gap-4">

                @if (!empty($settingItems['instagram']->value ?? null))
                    <a href="{{ $settingItems['instagram']->value }}" target="_blank" rel="noopener"
                        aria-label="Instagram" class="text-stone/60 hover:text-gold transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.6">
                            <rect x="3" y="3" width="18" height="18" rx="5" />
                            <circle cx="12" cy="12" r="4" />
                            <circle cx="17.2" cy="6.8" r="0.6" fill="currentColor" stroke="none" />
                        </svg>
                    </a>
                @endif

                @if (!empty($settingItems['facebook']->value ?? null))
                    <a href="{{ $settingItems['facebook']->value }}" target="_blank" rel="noopener"
                        aria-label="Facebook" class="text-stone/60 hover:text-gold transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M15 8h-2a2 2 0 0 0-2 2v10M9 13h4" />
                            <rect x="3" y="3" width="18" height="18" rx="3" />
                        </svg>
                    </a>
                @endif

                @if (!empty($settingItems['tiktok']->value ?? null))
                    <a href="{{ $settingItems['tiktok']->value }}" target="_blank" rel="noopener"
                        aria-label="TikTok" class="text-stone/60 hover:text-gold transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16.6 5.82c-.9-.79-1.47-1.9-1.6-3.14V2h-3.4v13.42a2.6 2.6 0 1 1-2.14-2.56v-3.44a5.99 5.99 0 0 0-1.06-.09A6 6 0 1 0 14.4 15V9.14a8.16 8.16 0 0 0 4.6 1.4V7.16a4.85 4.85 0 0 1-2.4-1.34Z" />
                        </svg>
                    </a>
                @endif

            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-10 text-center">
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-4">Kantor Pusat</h3>
            <p class="text-sm text-stone/80 leading-relaxed">
                {{ $settingItems['address']->value ?? 'Jl. Gajah Mada' }}
            </p>
            <p class="mt-2 text-sm text-stone/80">
                {{ $settingItems['phone_number']->value ?? 'No. Tlp' }}
            </p>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-6 text-center">
            <p class="text-sm text-stone/70">
                PSP Group &copy; {{ date('Y') }} PT. Putra Sentosa Prakarsa. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-3xl mx-auto px-6 lg:px-10 py-6 text-center">
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-4">Pasal Sanggahan</h3>
            <p class="text-xs text-stone/50 leading-relaxed">
                {{ $settingItems['pasal']->value ?? 'Pasal Sanggah' }}
            </p>
        </div>
    </div>
</footer>
