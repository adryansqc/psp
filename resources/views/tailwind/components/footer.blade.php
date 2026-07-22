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

                @if (!empty($settingItems['x']->value ?? null))
                    <a href="{{ $settingItems['x']->value }}" target="_blank" rel="noopener" aria-label="X"
                        class="text-stone/60 hover:text-gold transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.9 2H22l-7.6 8.7L23 22h-6.9l-5.4-6.6L4.5 22H1.4l8.1-9.3L1 2h7.1l4.9 6.1L18.9 2Zm-1.2 18h1.9L7.4 3.9H5.4L17.7 20Z" />
                        </svg>
                    </a>
                @endif

                @if (!empty($settingItems['linkedin']->value ?? null))
                    <a href="{{ $settingItems['linkedin']->value }}" target="_blank" rel="noopener"
                        aria-label="LinkedIn" class="text-stone/60 hover:text-gold transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9h4v12H3V9Zm7 0h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.86-3.06-1.87 0-2.16 1.46-2.16 2.96V21h-4V9Z" />
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
