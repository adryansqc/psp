@php
    $settingItems = App::make('settingItems');
    $logo = $settingItems['logo']->value ?? null;
    $logoUrl = $logo ? Storage::url($logo) : asset('dummypsp/assets/images/Logo_psp.png');
@endphp
<footer class="footer-area">
    <div class="container">
        <div class="footer-content text-center">
            <div class="footer-logo mb-3">
                <a href="{{ url('/') }}">
                    <img src="{{ $logoUrl }}" alt="{{ $settingItems['site_name']->value ?? 'Logo' }}"
                        style="max-height: 90px; object-fit: contain;">
                </a>
            </div>

            <ul class="footer-social mb-3"
                style="display:flex; justify-content:center; align-items:center; gap:15px; list-style:none; padding:0; margin:0 0 1rem 0;">
                <li><a href="{{ $settingItems['facebook']->value ?? '#' }}"><i class="fab fa-facebook"></i></a></li>
                <li><a href="{{ $settingItems['x']->value ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{ $settingItems['linkedin']->value ?? '#' }}"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="{{ $settingItems['instagram']->value ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>

            <div class="footer-copyright">
                <p class="mb-0">
                    &copy; {{ date('Y') }} {{ $settingItems['site_name']->value ?? 'PT. Putra Sentosa Prakarsa' }}.
                    All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>