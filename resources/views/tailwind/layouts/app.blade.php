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

</body>

</html>
