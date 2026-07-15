<style>
    .main-banner {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        background: #000;
    }

    .main-banner .owl-carousel {
        height: 100vh;
        position: relative;
    }

    .main-banner .owl-carousel .owl-stage-outer,
    .main-banner .owl-carousel .owl-stage,
    .main-banner .owl-carousel .owl-item {
        height: 100vh;
    }

    .main-banner .owl-carousel .owl-item .item {
        height: 100vh;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .main-banner .owl-carousel .owl-item .item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }

    .main-banner .owl-carousel .owl-item .item .bg-zoom {
        position: absolute;
        top: -5%;
        left: -5%;
        right: -5%;
        bottom: -5%;
        background-size: cover;
        background-position: center;
        transform: scale(1);
        transition: transform 8s ease-out;
        z-index: 0;
    }

    .main-banner .owl-carousel .owl-item.active .item .bg-zoom {
        transform: scale(1.1);
    }

    .main-banner .header-text {
        position: relative;
        z-index: 2;
        max-width: 700px;
        padding: 0 60px;
        color: #fff;
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .main-banner .owl-carousel .owl-item.active .header-text {
        opacity: 1;
        transform: translateY(0);
    }

    .main-banner .owl-carousel .owl-item:not(.active) .header-text {
        opacity: 0;
        transform: translateY(-30px);
    }

    .main-banner .header-text .category {
        display: inline-block;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #f5a623;
        background: rgba(255,255,255,0.1);
        padding: 8px 20px;
        border-radius: 30px;
        margin-bottom: 20px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255,255,255,0.1);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.3s;
    }

    .main-banner .owl-carousel .owl-item.active .header-text .category {
        opacity: 1;
        transform: translateY(0);
    }

    .main-banner .header-text h2 {
        font-size: 64px;
        font-weight: 700;
        line-height: 1.2;
        margin: 0;
        text-shadow: 0 4px 30px rgba(0,0,0,0.3);
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease 0.5s;
    }

    .main-banner .owl-carousel .owl-item.active .header-text h2 {
        opacity: 1;
        transform: translateY(0);
    }

    .main-banner .header-text h2 br {
        display: block;
    }

    .hero-thumbnails {
        position: absolute;
        bottom: 40px;
        right: 40px;
        z-index: 10;
        display: flex;
        gap: 20px;
        padding: 0;
        background: transparent;
        backdrop-filter: none;
        border: none;
    }

    .hero-thumb {
        width: 80px;
        height: 100px;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        opacity: 0.4;
        transition: opacity 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                    transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                    border-color 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border: 3px solid rgba(255,255,255,0.3);
        position: relative;
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .hero-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .hero-thumb:hover {
        opacity: 0.8;
        transform: scale(1.05);
        border-color: rgba(255,255,255,0.6);
    }

    .hero-thumb:hover img {
        transform: scale(1.1);
    }

    .hero-thumb.active {
        opacity: 1;
        border-color: #fff;
        transform: scale(1.1);
        box-shadow: 0 0 40px rgba(255,255,255,0.3);
    }

    .hero-thumb.active img {
        transform: scale(1.1);
    }

    .hero-thumb.is-launching {
        opacity: 0;
        pointer-events: none;
    }

    .hero-thumb .thumb-index {
        display: none;
    }

    .hero-expand-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 9999;
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.45);
        opacity: 1;
        pointer-events: none;
        transform-origin: 0 0;
        will-change: transform, border-radius;
    }

    .hero-expand-overlay.is-expanding {
        border-radius: 0;
        box-shadow: 0 0 0 rgba(0, 0, 0, 0);
    }

    .hero-expand-overlay.is-fading {
        opacity: 0;
        transition: opacity 0.4s ease !important;
    }

    .owl-nav {
        display: none !important;
    }

    @media (max-width: 1024px) {
        .main-banner .header-text h2 {
            font-size: 48px;
        }

        .hero-thumb {
            width: 70px;
            height: 90px;
        }

        .hero-thumbnails {
            bottom: 30px;
            right: 30px;
            gap: 15px;
        }
    }

    @media (max-width: 768px) {
        .main-banner .header-text {
            padding: 0 30px;
            max-width: 100%;
        }

        .main-banner .header-text h2 {
            font-size: 32px;
            line-height: 1.3;
        }

        .main-banner .header-text .category {
            font-size: 12px;
            padding: 6px 16px;
        }

        .hero-thumbnails {
            bottom: 20px;
            right: 20px;
            gap: 12px;
            padding: 0;
            max-width: calc(100% - 40px);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .hero-thumbnails::-webkit-scrollbar {
            display: none;
        }

        .hero-thumb {
            width: 60px;
            height: 80px;
            flex-shrink: 0;
            border-width: 2px;
        }

        .main-banner .owl-carousel .owl-item .item::before {
            background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.8) 100%);
        }
    }

    @media (max-width: 480px) {
        .main-banner .header-text h2 {
            font-size: 26px;
        }

        .hero-thumb {
            width: 50px;
            height: 70px;
            border-radius: 8px;
        }

        .hero-thumbnails {
            bottom: 15px;
            right: 15px;
            gap: 10px;
        }
    }
</style>

<div class="main-banner">
    <div class="owl-carousel owl-banner">
        @forelse ($sliders as $slider)
            <div class="item">
                <div class="bg-zoom"
                     style="background-image: url('{{ Storage::url($slider->gambar) }}');">
                </div>
                <div class="header-text">
                    <span class="category">{{ $slider->second_title ?? 'Premium Resort' }}</span>
                    <h2>{!! nl2br(e($slider->title ?? 'Welcome to Paradise')) !!}</h2>
                </div>
            </div>
        @empty
            <div class="item">
                <div class="bg-zoom"
                     style="background-image: url('{{ asset('dummypsp/assets/images/banner-01.jpg') }}');">
                </div>
                <div class="header-text">
                    <span class="category">Rumah Kito Resort, Indonesia</span>
                    <h2>Hurry!<br>Get the Best Villa for you</h2>
                </div>
            </div>
        @endforelse
    </div>

    @if($sliders && count($sliders) > 0)
        <div class="hero-thumbnails">
            @foreach ($sliders as $index => $slider)
                <div class="hero-thumb {{ $loop->first ? 'active' : '' }}"
                     data-index="{{ $index }}">
                    <img src="{{ Storage::url($slider->gambar) }}"
                         alt="Thumbnail {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var owlBanner = $('.owl-banner');

        if (owlBanner.length > 0) {
            owlBanner.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 800,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                nav: false,
                dots: false,
                lazyLoad: true,
                onInitialized: function(event) {
                    var currentIndex = event.item.index;
                    updateActiveThumbnail(currentIndex);
                },
                onChanged: function(event) {
                    var currentIndex = event.item.index;
                    updateActiveThumbnail(currentIndex);
                }
            });
        }

        function updateActiveThumbnail(index) {
            $('.hero-thumb').removeClass('active');
            $('.hero-thumb[data-index="' + index + '"]').addClass('active');
        }

        $('.hero-thumb').on('click', function() {
            var $this = $(this);
            var index = $this.data('index');

            if ($this.hasClass('active')) {
                return;
            }

            var imgSrc = $this.find('img').attr('src');
            var rect = this.getBoundingClientRect();
            var vw = window.innerWidth;
            var vh = window.innerHeight;

            var scaleX = rect.width / vw;
            var scaleY = rect.height / vh;
            var translateX = rect.left;
            var translateY = rect.top;

            var owl = $('.owl-banner').data('owl.carousel');
            if (owl && owl.settings.autoplay) {
                owl.stop();
            }

            var $overlay = $('<div class="hero-expand-overlay"></div>')
                .css({
                    backgroundImage: 'url("' + imgSrc + '")',
                    transition: 'none',
                    transform: 'translate(' + translateX + 'px, ' + translateY + 'px) scale(' + scaleX + ', ' + scaleY + ')'
                })
                .appendTo('body');

            requestAnimationFrame(function() {
                requestAnimationFrame(function() {
                    $overlay.css({
                        transition: 'transform 0.8s cubic-bezier(0.65, 0, 0.35, 1), border-radius 0.8s cubic-bezier(0.65, 0, 0.35, 1), box-shadow 0.8s cubic-bezier(0.65, 0, 0.35, 1)',
                        transform: 'translate(0px, 0px) scale(1, 1)'
                    }).addClass('is-expanding');
                });
            });

            $('.hero-thumb').removeClass('active');
            $this.addClass('active');

            var switchedSlide = false;

            function switchSlideBehindOverlay() {
                if (switchedSlide) return;
                switchedSlide = true;

                $('.owl-banner').trigger('to.owl.carousel', [index, 300]);

                var fadedOut = false;

                function fadeOutOverlay() {
                    if (fadedOut) return;
                    fadedOut = true;
                    $overlay.addClass('is-fading');
                    setTimeout(function() {
                        $overlay.remove();
                        if (owl && owl.settings.autoplay) {
                            owl.play();
                        }
                    }, 400);
                }

                $('.owl-banner').one('translated.owl.carousel', fadeOutOverlay);
                setTimeout(fadeOutOverlay, 500);
            }

            $overlay.on('transitionend', function(e) {
                if (e.originalEvent && e.originalEvent.propertyName && e.originalEvent.propertyName !== 'transform') {
                    return;
                }
                switchSlideBehindOverlay();
            });

            setTimeout(switchSlideBehindOverlay, 850);
        });

        $('.owl-banner').on('translate.owl.carousel', function() {
            $('.owl-banner .owl-item.active .header-text').css({
                'opacity': '0',
                'transform': 'translateY(-30px)'
            });
        });

        $('.owl-banner').on('translated.owl.carousel', function() {
            $('.owl-banner .owl-item.active .header-text').css({
                'opacity': '1',
                'transform': 'translateY(0)'
            });
        });
    });
</script>