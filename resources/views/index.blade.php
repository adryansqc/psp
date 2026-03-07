@extends('layouts.frontend.app')

@push('title')
    {{ 'Beranda' }}
@endpush

@section('content')
    <section class="relative flex min-h-[100vh] w-full max-w-[100vw] flex-col overflow-hidden max-lg:p-4 max-md:pt-[50px] dark:bg-slate-900">
        <div class="flex h-full min-h-[100vh] w-full place-content-center gap-6 p-[5%] max-xl:place-items-center max-lg:flex-col">
            <div class="flex flex-col place-content-center">
                <div class="flex flex-col text-6xl font-semibold uppercase leading-[80px] max-lg:text-4xl max-md:leading-snug dark:text-white">
                    <span class="reveal-hero-text tracking-[.2em]">{{ $settingItems['site_name']->value ?? 'Nama Website' }}</span>
                    <span class="reveal-hero-text">Sarolangun</span>
                </div>
                <div class="reveal-hero-text mt-2 max-w-[450px] p-2 text-justify max-lg:max-w-full dark:text-gray-200">
                    Sistem Informasi Media, mewujudkan informasi yang profesional, cerdas, terbuka, akuntabel dan dapat dipercaya untuk SAROLANGUN MAJU
                </div>
                <div class="reveal-hero-text mt-4 flex place-items-center gap-4 overflow-hidden p-2">
                    <a href="{{ route('auth.redirect', 'google') }}" class="h-[50px] max-w-[250px] transform transition-transform duration-300 hover:scale-105">
                        <img src="{{ asset('/') }}assets/images/sign-in-w-google.png" alt="Sign In" class="h-full w-full" srcset="" />
                    </a>
                </div>
            </div>
            <div class="flex w-full max-w-[50%] place-content-center place-items-center overflow-hidden max-lg:max-w-[unset]">
                <div class="relative flex max-h-[580px] min-h-[450px] min-w-[350px] max-w-[650px] overflow-hidden max-lg:h-fit max-lg:max-h-[320px] max-lg:min-h-[180px] max-lg:w-[320px] max-lg:min-w-[320px] transform transition-all duration-300 hover:-translate-y-2">
                    <img src="{{ asset('/') }}assets/images/hero.png" alt="app" class="reveal-hero-img z-[1] h-full w-full object-contain rounded-lg" />
                    <div class="absolute bottom-0 left-1/2 h-[80%] w-[80%] -translate-x-1/2 rounded-full bg-secondary" id="hero-img-bg"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="announcement" class="pt-5 flex w-full flex-col place-items-center px-4 py-8 dark:bg-slate-900">
        <h3 class="text-4xl font-medium max-md:text-2xl dark:text-white">
            Pengumuman
        </h3>
        <div id="pengumuman-list" class="mt-10 lg:px-14 grid gap-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @include('components._pengumuman_card')
        </div>

        <div id="pengumuman-loading-spinner" class="hidden mt-6">
            <div class="flex justify-center items-center">
                <div class="animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
            </div>
        </div>

        <button id="pengumuman-load-more-btn" data-offset="6" type="button"
            class="cursor-pointer group relative mt-8 inline-flex items-center justify-center overflow-hidden rounded-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 px-6 py-3 font-semibold text-white shadow-lg transition-all duration-300 hover:from-blue-600 hover:to-blue-800 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
            <span class="absolute left-0 top-0 h-full w-0 bg-white/10 transition-all duration-300 group-hover:w-full"></span>
            <span class="relative z-10 flex items-center gap-2">
                <svg class="h-5 w-5 text-white opacity-80 group-hover:animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                Lihat lebih banyak
            </span>
        </button>
    </section>

    <x-pengumuman-detail-modal />
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        const pengumumanLoadMoreBtn = document.getElementById('pengumuman-load-more-btn');
        const pengumumanList = document.getElementById('pengumuman-list');
        const pengumumanLoadingSpinner = document.getElementById('pengumuman-loading-spinner');

        pengumumanLoadMoreBtn.addEventListener('click', function() {
            const offset = parseInt(this.dataset.offset);

            pengumumanLoadingSpinner.classList.remove('hidden');
            pengumumanLoadMoreBtn.disabled = true;
            pengumumanLoadMoreBtn.textContent = 'Loading...';

            fetch(`/pengumuman/load-more?offset=${offset}`)
                .then(res => res.json())
                .then(data => {
                    pengumumanList.insertAdjacentHTML('beforeend', data.html);
                    pengumumanLoadMoreBtn.dataset.offset = data.next_offset;

                    if (!data.has_more) {
                        pengumumanLoadMoreBtn.style.display = 'none';
                    }
                })
                .catch(err => {
                    console.error(err);
                })
                .finally(() => {
                    pengumumanLoadingSpinner.classList.add('hidden');
                    pengumumanLoadMoreBtn.disabled = false;
                    pengumumanLoadMoreBtn.textContent = 'Lihat lebih banyak';
                });
        });
    </script>

    @if ($pengumumanPopup)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const popupKey = 'popupShownAt';
                const popupDuration = 60 * 60 * 1000;

                const lastShown = localStorage.getItem(popupKey);
                const now = new Date().getTime();

                if (!lastShown || now - lastShown > popupDuration) {
                    document.getElementById('modal-gambar').src = "{{ $pengumumanPopup['image'] }}";
                    document.getElementById('modal-judul').textContent = "{{ $pengumumanPopup['judul'] }}";
                    document.getElementById('modal-tanggal').textContent = "{{ $pengumumanPopup['created_at'] }}";
                    document.getElementById('modal-isi').innerHTML = "{{ $pengumumanPopup['isi'] }}";
                    document.getElementById('pengumuman-modal').classList.remove('hidden');
                    document.getElementById('pengumuman-modal').classList.add('flex');

                    localStorage.setItem(popupKey, now);
                }
            });
        </script>
    @endif
@endpush
