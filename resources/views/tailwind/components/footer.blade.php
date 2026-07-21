<footer class="bg-forest text-stone font-body">
    <div class="border-t border-gold/40"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-10">

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Korporasi</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ url('/tentang') }}" class="hover:text-gold transition-colors">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-gold transition-colors">Penghargaan</a></li>
                <li><a href="#" class="hover:text-gold transition-colors">Karir</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Proyek</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ url('/proyek') }}" class="hover:text-gold transition-colors">Semua Proyek</a></li>
                <li><a href="#" class="hover:text-gold transition-colors">Nama Proyek Satu</a></li>
                <li><a href="#" class="hover:text-gold transition-colors">Nama Proyek Dua</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Berita & Acara</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ url('/berita') }}" class="hover:text-gold transition-colors">Semua Berita</a></li>
                <li><a href="#" class="hover:text-gold transition-colors">Acara Terbaru</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Hubungi Kami</h3>
            <ul class="space-y-3 text-sm text-stone/80">
                <li><a href="{{ url('/kontak') }}" class="hover:text-gold transition-colors">Kontak</a></li>
                <li>
                    <a href="mailto:{{ $settingItems['email']->value ?? '' }}"
                        class="hover:text-gold transition-colors">
                        {{ $settingItems['email']->value ?? 'Email Perusahaan' }}
                    </a>
                </li>
                <li>
                    <a href="tel:{{ $settingItems['phone_number']->value ?? '' }}"
                        class="hover:text-gold transition-colors">
                        {{ $settingItems['phone_number']->value ?? 'No. Tlp' }}
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-gold mb-5">Ikuti Kami</h3>
            <div class="flex items-center gap-4">
                <a href="#" aria-label="Instagram" class="text-stone/60 hover:text-gold transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.2" cy="6.8" r="0.6" fill="currentColor" stroke="none" />
                    </svg>
                </a>
                <a href="#" aria-label="Facebook" class="text-stone/60 hover:text-gold transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path d="M15 8h-2a2 2 0 0 0-2 2v10M9 13h4" />
                        <rect x="3" y="3" width="18" height="18" rx="3" />
                    </svg>
                </a>
                <a href="#" aria-label="YouTube" class="text-stone/60 hover:text-gold transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <rect x="3" y="6" width="18" height="12" rx="3" />
                        <path d="M11 10l4 2-4 2v-4z" fill="currentColor" stroke="none" />
                    </svg>
                </a>
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
