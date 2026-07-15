<style>
    :root {
        --primary-color: #1a1a2e;
        --secondary-color: #16213e;
        --accent-color: #f35525;
        --gold-color: #c9a84c;
        --light-bg: #f8f9fa;
        --text-dark: #1a1a2e;
        --text-light: #6c757d;
        --transition-smooth: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --shadow-soft: 0 20px 60px rgba(0, 0, 0, 0.08);
        --shadow-hover: 0 30px 80px rgba(0, 0, 0, 0.15);
    }

    .about-premium {
        padding: 100px 0;
        background: var(--light-bg);
        position: relative;
        overflow: hidden;
    }

    .about-premium::before {
        content: '';
        position: absolute;
        top: -30%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(243, 85, 37, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        animation: floatBg 20s ease-in-out infinite;
    }

    .about-premium::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        animation: floatBg 25s ease-in-out infinite reverse;
    }

    @keyframes floatBg {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(30px, -30px) scale(1.1); }
    }

    .about-premium .deco-shape {
        position: absolute;
        border: 2px solid rgba(243, 85, 37, 0.08);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }

    .about-premium .deco-shape-1 {
        width: 300px;
        height: 300px;
        top: 10%;
        right: 5%;
        animation: rotateShape 30s linear infinite;
    }

    .about-premium .deco-shape-2 {
        width: 200px;
        height: 200px;
        bottom: 15%;
        left: 3%;
        border-color: rgba(243, 85, 37, 0.06);
        animation: rotateShape 25s linear infinite reverse;
    }

    @keyframes rotateShape {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .about-image-wrapper {
        position: relative;
        padding: 20px;
        opacity: 0;
        transform: translateX(-80px) scale(0.9);
        filter: blur(10px);
        transition: all 0.8s var(--transition-smooth);
    }

    .about-image-wrapper.visible {
        opacity: 1;
        transform: translateX(0) scale(1);
        filter: blur(0);
    }

    .about-image-container {
        position: relative;
        clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
        transition: clip-path 0.7s var(--transition-smooth);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
    }

    .about-image-container:hover {
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        box-shadow: var(--shadow-hover);
    }

    .about-image-container img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        display: block;
        transition: transform 0.7s var(--transition-smooth);
    }

    .about-image-container:hover img {
        transform: scale(1.08);
    }

    .about-image-container::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(135deg, var(--accent-color), #ff6b35, var(--accent-color));
        background-size: 300% 300%;
        z-index: -1;
        animation: gradientMove 3s ease infinite;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .about-image-container:hover::before {
        opacity: 1;
    }

    @keyframes gradientMove {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .about-image-container::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
        transform: rotate(45deg) translateX(-100%);
        transition: transform 0.8s ease;
        pointer-events: none;
    }

    .about-image-container:hover::after {
        transform: rotate(45deg) translateX(100%);
    }

    .about-image-wrapper {
        animation: floatImage 6s ease-in-out infinite;
    }

    @keyframes floatImage {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .about-image-wrapper.visible {
        animation: floatImage 6s ease-in-out infinite;
    }

    .about-image-badge {
        position: absolute;
        bottom: 30px;
        right: -10px;
        background: linear-gradient(135deg, var(--accent-color), #ff6b35);
        color: #fff;
        padding: 15px 25px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        z-index: 2;
        box-shadow: 0 10px 30px rgba(243, 85, 37, 0.3);
        opacity: 0;
        transform: translateY(20px) scale(0.9);
        transition: all 0.5s var(--transition-smooth) 0.5s;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
    }

    .about-image-wrapper.visible .about-image-badge {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .about-image-badge span {
        display: block;
        font-size: 24px;
        font-weight: 700;
    }

    .about-content {
        padding-left: 30px;
        opacity: 0;
        transform: translateY(60px);
        transition: opacity 0.8s var(--transition-smooth), transform 0.8s var(--transition-smooth);
    }

    .about-content.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .about-content .section-heading h6 {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s var(--transition-smooth) 0.1s;
    }

    .about-content.visible .section-heading h6 {
        opacity: 1;
        transform: translateY(0);
    }

    .about-content .section-heading h2 {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.7s var(--transition-smooth) 0.25s;
    }

    .about-content.visible .section-heading h2 {
        opacity: 1;
        transform: translateY(0);
    }

    .about-content .section-heading p {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.7s var(--transition-smooth) 0.45s;
    }

    .about-content.visible .section-heading p {
        opacity: 1;
        transform: translateY(0);
    }

    .about-content .main-button {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.7s var(--transition-smooth) 0.7s;
    }

    .about-content.visible .main-button {
        opacity: 1;
        transform: translateY(0);
    }

    .about-content .main-button a {
        display: inline-block;
        background: #ff0000;
        color: #fff;
        padding: 14px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(255, 0, 0, 0.25);
        border: none;
    }

    .about-content .main-button a:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 0, 0, 0.35);
        background: #e60000;
        color: #fff;
        text-decoration: none;
    }

    .about-content .main-button a i {
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        display: inline-block;
    }

    .about-content .main-button a:hover i {
        transform: translateX(5px);
    }

    .about-content .main-button a .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        transform: scale(0);
        animation: rippleAnim 0.6s linear;
        pointer-events: none;
    }

    @keyframes rippleAnim {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .about-content .main-button a::after {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(135deg, #ff0000, #ff6b35);
        border-radius: 50px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
        filter: blur(10px);
    }

    .about-content .main-button a:hover::after {
        opacity: 1;
    }

    @media (max-width: 992px) {
        .about-content {
            padding-left: 0;
            padding-top: 40px;
        }

        .about-content .section-heading h2 {
            font-size: 32px !important;
        }

        .about-image-container img {
            height: 380px;
        }

        .about-premium {
            padding: 70px 0;
        }

        .about-image-wrapper {
            animation: none;
        }

        .about-image-wrapper.visible {
            animation: none;
        }
    }

    @media (max-width: 768px) {
        .about-premium {
            padding: 50px 0;
        }

        .about-content .section-heading h2 {
            font-size: 28px !important;
        }

        .about-image-container img {
            height: 300px;
        }

        .about-image-container {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        .about-image-container:hover {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        .about-image-badge {
            bottom: 20px;
            right: 20px;
            padding: 12px 20px;
            font-size: 12px;
        }

        .about-image-badge span {
            font-size: 20px;
        }

        .about-premium::before,
        .about-premium::after {
            display: none;
        }

        .about-premium .deco-shape {
            display: none;
        }

        .about-content .section-heading p {
            font-size: 15px !important;
            margin-right: 0 !important;
        }

        .about-content .main-button a {
            padding: 12px 30px;
            font-size: 14px;
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .about-content .section-heading h2 {
            font-size: 24px !important;
        }

        .about-image-container img {
            height: 250px;
        }

        .about-image-wrapper {
            padding: 10px;
        }

        .about-image-badge {
            padding: 10px 16px;
            font-size: 11px;
            bottom: 15px;
            right: 15px;
        }

        .about-image-badge span {
            font-size: 18px;
        }
    }
</style>

<section class="about-premium">
    <div class="deco-shape deco-shape-1"></div>
    <div class="deco-shape deco-shape-2"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image-wrapper" data-animate>
                    <div class="about-image-container">
                        <img src="{{ asset('dummypsp') }}/assets/images/mansionkito.jpg" alt="About Us">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content" data-animate>
                    <div class="section-heading">
                        <h6 style="color: #f35525; font-weight: 600; letter-spacing: 1px;">| Tentang Kami</h6>
                        <h2 style="font-size: 36px; font-weight: 700; margin-top: 10px;">
                            Putra Sentosa <br><span style="color: #f35525;">Prakarsa</span>
                        </h2>
                        <p style="margin-top: 20px; margin-right: 10px; font-size: 16px; line-height: 1.9; color: #4a4a4a; text-align: justify;">
                            PT. Putra Sentosa Prakarsa (PSP) merupakan pengembang real estat yang berfokus pada perumahan, perkantoran, ruko, real estate, dan area komersial lainnya. Konsep utama yang diemban adalah menciptakan tata ruang sebagai satu kesatuan dengan kawasan terpadu setempat, serta pola tata hijau dan asri — nyata tertuang pada Puri Mayang.
                            <br><br>
                            PSP berani menjadi pelopor perumahan Real Estate Resort pertama yang terbaik dan termewah di kawasan ini, melihat potensi Jambi yang ke depannya akan semakin baik. PSP dikenal sebagai pengembang besar dan terpercaya dengan keunggulan kualitas produk dan legalitas terjamin.
                        </p>
                        <div class="main-button" style="margin-top: 35px;">
                            <a href="{{ route('frontend.about') }}"
                               style="display: inline-block; background: #ff0000; color: #fff; padding: 1px 35px;
                                      border-radius: 50px; text-decoration: none; font-weight: 600;
                                      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); letter-spacing: 0.5px;
                                      box-shadow: 0 10px 30px rgba(255, 0, 0, 0.25); border: none;">
                                <i class="fa fa-arrow-right" style="margin-right: 8px; transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); display: inline-block;"></i>
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const animateElements = document.querySelectorAll('[data-animate]');

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animateElements.forEach(function(element) {
            observer.observe(element);
        });

        const btn = document.querySelector('.about-content .main-button a');

        if (btn) {
            btn.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                ripple.className = 'ripple';

                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255,255,255,0.3)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'rippleAnim 0.6s linear';
                ripple.style.pointerEvents = 'none';

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(function() {
                    ripple.remove();
                }, 600);
            });
        }

        const imageContainer = document.querySelector('.about-image-container');

        if (window.innerWidth > 992 && imageContainer) {
            document.querySelector('.about-premium').addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;

                const img = imageContainer.querySelector('img');
                if (img) {
                    img.style.transform = 'scale(1.05) translate(' + (x * 5) + 'px, ' + (y * 5) + 'px)';
                }
            });

            imageContainer.addEventListener('mouseleave', function() {
                const img = this.querySelector('img');
                if (img) {
                    img.style.transform = 'scale(1) translate(0, 0)';
                }
            });
        }

        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                if (window.innerWidth <= 992) {
                    const img = document.querySelector('.about-image-container img');
                    if (img) {
                        img.style.transform = 'scale(1) translate(0, 0)';
                    }
                }
            }, 250);
        });
    });
</script>