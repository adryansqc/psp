<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! $settingItems['meta']->value ?? '' !!}

    <title>@yield('title') - Putra Sentosa Prakasa</title>

    @if (isset($settingItems['favicon']) &&
            $settingItems['favicon']->value &&
            \Storage::disk('public')->exists($settingItems['favicon']->value))
        <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url($settingItems['favicon']->value) }}">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dummypsp') }}/assets/images/Logo_psp.png">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="{{ asset('css/aos/aos.css') }}" rel="stylesheet">

    @stack('style')
</head>

<body class="bg-cream text-ink font-sans antialiased">

    @include('tailwind.components.navbar')

    @yield('content')

    @include('tailwind.components.footer')

    @include('tailwind.components.whatsapp-float')

    <script src="{{ asset('js/aos/aos.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                duration: 1000,
                easing: 'ease-out-cubic',
                offset: 120,
                mirror: false,
                anchorPlacement: 'top-bottom'
            });
        });
    </script>

    @stack('script')

    <div id="google_translate_element" style="display:none;"></div>

    <script>
        function getCookie(name) {
            const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;
        }

        function setGoogleLang(langCode) {
            const saved = localStorage.getItem('preferred_lang');

            if (saved === langCode) {
                return;
            }

            localStorage.setItem('preferred_lang', langCode);

            if (langCode === 'id') {
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + location.hostname;
            } else {
                document.cookie = 'googtrans=/id/' + langCode + '; path=/';
                document.cookie = 'googtrans=/id/' + langCode + '; path=/; domain=' + location.hostname;
            }

            location.reload();
        }

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en',
                autoDisplay: false
            }, 'google_translate_element');
        }

        (function() {
            const savedLang = localStorage.getItem('preferred_lang');
            const currentCookie = getCookie('googtrans');

            if (savedLang === 'en' && !currentCookie) {
                document.cookie = 'googtrans=/id/en; path=/';
            } else if ((savedLang === 'id' || !savedLang) && currentCookie) {
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + location
                    .hostname;
            }
        })();
    </script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
