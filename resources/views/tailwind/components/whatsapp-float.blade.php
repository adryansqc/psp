@php
    $phoneRaw = $settingItems['phone_number']->value ?? '';
    $phoneClean = preg_replace('/[^0-9]/', '', $phoneRaw);

    if (str_starts_with($phoneClean, '0')) {
        $phoneClean = '62' . substr($phoneClean, 1);
    }

    $waLink = $phoneClean
        ? 'https://wa.me/' .
            $phoneClean .
            '?text=' .
            urlencode('Halo, saya ingin bertanya seputar PT. Putra Sentosa Prakarsa.')
        : null;
@endphp

@if ($waLink)
    <a href="{{ $waLink }}" target="_blank" rel="noopener"
        class="fixed bottom-6 right-6 z-50 flex items-center gap-3 pl-4 pr-5 py-3 rounded-full bg-[#25D366] text-white shadow-lg hover:scale-105 transition-transform"
        aria-label="Hubungi kami via WhatsApp">

        <span class="relative flex items-center justify-center w-7 h-7 shrink-0">
            <span class="absolute inset-0 rounded-full bg-white/40 animate-ping"></span>
            <svg class="relative w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.96 6.45 17.5 2 12.04 2Zm5.76 14.16c-.24.68-1.4 1.3-1.94 1.38-.5.08-1.12.11-1.81-.11-.42-.13-.95-.31-1.64-.6-2.88-1.24-4.76-4.14-4.9-4.33-.14-.19-1.17-1.56-1.17-2.98s.73-2.11 1-2.4c.24-.27.53-.34.7-.34h.5c.16 0 .38-.03.58.44.24.57.79 1.98.86 2.13.07.14.11.31.02.5-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.71 1.17 1.52 1.9 1.05.94 1.93 1.23 2.21 1.37.28.14.44.12.6-.07.16-.19.68-.79.87-1.06.19-.27.37-.22.62-.13.26.09 1.63.77 1.91.91.28.14.47.21.53.33.07.12.07.68-.17 1.36Z" />
            </svg>
        </span>

        <span class="text-sm font-medium whitespace-nowrap">Hubungi Kami</span>
    </a>
@endif
