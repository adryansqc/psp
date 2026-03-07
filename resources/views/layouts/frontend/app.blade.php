<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! $settingItems['meta']->value ?? '' !!}

    <title>{{ $settingItems['site_name']->value ?? 'Nama Website' }} - @stack('title', 'Halaman')</title>
    @if ($settingItems['favicon']->value && Storage::disk('public')->exists($settingItems['favicon']->value))
        <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url($settingItems['favicon']->value) }}" rel="shortcut icon">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}assets/images/favicon.png">
    @endif

    <link rel="stylesheet" href="{{ asset('/') }}assets/aisales-template/css/index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('styles')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="tw-flex tw-min-h-[100vh] tw-flex-col tw-bg-[#fff]">
    @include('layouts.frontend.header')

    @yield('content')

    @include('layouts.frontend.footer')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/gsap.min.js" integrity="sha512-B1lby8cGcAUU3GR+Fd809/ZxgHbfwJMp0jLTVfHiArTuUt++VqSlJpaJvhNtRf3NERaxDNmmxkdx2o+aHd4bvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/ScrollTrigger.min.js" integrity="sha512-AY2+JxnBETJ0wcXnLPCcZJIJx0eimyhz3OJ55k2Jx4RtYC+XdIi2VtJQ+tP3BaTst4otlGG1TtPJ9fKrAUnRdQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/') }}assets/aisales-template/js/index.js"></script>
    <script src="{{ asset('/assets/alpinejs/cdn-alpinejs.min.js') }}" defer></script>
    @stack('scripts')

    <style>
        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            text-align: center;
            /* font-size: 12px; */
            opacity: 1;
            background: #f7f7f7fa;
            left: auto;
        }

        .swiper-pagination-bullet:hover {
            color: #000;
            opacity: 1;
            background: #ede0e0bd;
        }

        .swiper-pagination-bullet-active {
            background: #f39696 !important;
        }

        .swiper {
            padding: 10px !important;
        }
    </style>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            centeredSlides: true,

            // If we need pagination
            pagination: {
                el: '.pagination-container',
                clickable: true,
                renderBullet: function(index, className) {
                    return `<span class="${className}"></span>`
                },
            },
            // Navigation arrows
            navigation: {
                nextEl: '.testmonial-next',
                prevEl: '.testmonial-prev',
            },
        })
    </script>
</body>

</html>
