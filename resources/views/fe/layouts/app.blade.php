
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! $settingItems['meta']->value ?? '' !!}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>@yield('title') - Putra Sentosa Prakasa</title>
    @if ($settingItems['favicon']->value && Storage::disk('public')->exists($settingItems['favicon']->value))
        <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url($settingItems['favicon']->value) }}" rel="shortcut icon">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dummypsp') }}/assets/images/Logo_psp.png">
    @endif
    <link href="{{ asset('dummypsp') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dummypsp') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('dummypsp') }}/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="{{ asset('dummypsp') }}/assets/css/owl.css">
    <link rel="stylesheet" href="{{ asset('dummypsp') }}/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="{{ asset('css/aos/aos.css') }}" rel="stylesheet">

    @stack('style')
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  @include('fe.components.preload')
  <!-- ***** Preloader End ***** -->

  @include('fe.components.headerinfo')

  <!-- ***** Header Area Start ***** -->
  @include('fe.components.menu')
  <!-- ***** Header Area End ***** -->

  @yield('content')

  @include('fe.components.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('dummypsp') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('dummypsp') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('dummypsp') }}/assets/js/isotope.min.js"></script>
  <script src="{{ asset('dummypsp') }}/assets/js/owl-carousel.js"></script>
  <script src="{{ asset('dummypsp') }}/assets/js/counter.js"></script>
  <script src="{{ asset('dummypsp') }}/assets/js/custom.js"></script>
  <script src="{{ asset('js/aos/aos.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
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