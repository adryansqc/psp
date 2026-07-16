@extends('fe.layouts.app')

@section('title')
    Home
@endsection

@push('style')
    <style>
        .section {
            margin-top: 0px !important;
        }
    </style>
@endpush

@section('content')

    {{-- <div class="main-banner">
        <div class="owl-carousel owl-banner">
            @forelse ($sliders as $slider)
                <div class="item"
                    style="background-image: url('{{ Storage::url($slider->gambar) }}');">
                    <div class="header-text">
                        <span class="category">{{ $slider->second_title }}</span>
                        <h2>{!! nl2br(e($slider->title)) !!}</h2>
                    </div>
                </div>
            @empty
                <div class="item item-1">
                    <div class="header-text">
                        <span class="category">Rumah Kito Resort, Indonesia</span>
                        <h2>Hurry!<br>Get the Best Villa for you</h2>
                    </div>
                </div>
            @endforelse
        </div>
    </div> --}}
    @include('fe.page.Beranda.hero_section')

    @include('fe.page.Beranda.featured_section')

    <div class="video section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 data-aos="fade-down" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">| Video View</h6>
                        <h2 data-aos="fade-up" data-aos-delay="150" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">Get Closer View & Different Feeling</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="video-frame" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                        <img src="{{ asset('dummypsp') }}/assets/images/rumahkito.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=3imCL4Bk83c" target="_blank"
                           data-aos="zoom-in" data-aos-delay="300" data-aos-duration="700" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6 data-aos="fade-down" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">| Featured Projects</h6>
                        <h2 data-aos="fade-up" data-aos-delay="150" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">Featured Projects Putra Sentosa Prakarsa</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper">
                                <ul class="nav nav-tabs" role="tablist"
                                    data-aos="fade-down" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                    @foreach ($pinnedProjects as $index => $project)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                id="tab-{{ $project->uuid }}" data-bs-toggle="tab"
                                                data-bs-target="#project-{{ $project->uuid }}" type="button"
                                                role="tab" aria-controls="project-{{ $project->uuid }}"
                                                aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                {{ $project->nama_projek }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                @foreach ($pinnedProjects as $index => $project)
                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                        id="project-{{ $project->uuid }}" role="tabpanel"
                                        aria-labelledby="tab-{{ $project->uuid }}">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div style="border-radius: 8px; overflow: hidden;"
                                                     data-aos="fade-right" data-aos-duration="900" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                                    {!! $project->lokasi !!}
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                @if ($project->cover)
                                                    <img src="{{ Storage::url($project->cover) }}"
                                                        alt="{{ $project->nama_projek }}"
                                                        style="width: 100%; border-radius: 8px;"
                                                        data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                                @else
                                                    <img src="{{ asset('dummypsp/assets/images/bestrumahkito.jpg') }}"
                                                        alt="{{ $project->nama_projek }}"
                                                        style="width: 100%; border-radius: 8px;"
                                                        data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                                @endif
                                            </div>

                                            <div class="col-lg-3">
                                                <h4 data-aos="fade-left" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                                    Informasi Tentang {{ $project->nama_projek }}
                                                </h4>
                                                <p data-aos="fade-left" data-aos-delay="150" data-aos-duration="900" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                                    {{ Str::limit($project->informasi, 200) }}
                                                </p>
                                                <div class="icon-button"
                                                     data-aos="fade-left" data-aos-delay="300" data-aos-duration="700" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                                    <a href="{{ route('frontend.project', $project->uuid) }}">
                                                        <i class="fa fa-arrow-right"></i> Selengkapnya
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('frontend.allProject') }}"
                        style="display: inline-block; background: #ff0000; color: #fff; padding: 10px 35px;
                                border-radius: 25px; text-decoration: none; font-weight: 600;
                                transition: all 0.3s ease; letter-spacing: 0.5px;"
                        data-aos="zoom-in" data-aos-duration="700" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                <i class="fa fa-th-list"></i>
                        Lihat semua project
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 data-aos="fade-down" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">| Contact Us</h6>
                        <h2 data-aos="fade-up" data-aos-delay="150" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">Get In Touch With Our Agents</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                        <x-leaflet-project-map :projects="$mapProjects" />
                    </div>

                    <div class="cta-content mt-4">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="item email"
                                             data-aos="fade-right" data-aos-delay="100" data-aos-duration="900" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                            <a href="mailto:{{ $settingItems['email']->value ?? 'email@perusahaan.com' }}"
                                               style="text-decoration: none; color: inherit;">
                                                <h6 style="margin:0;">
                                                    {{ $settingItems['email']->value ?? 'Email Perusahaan' }}<br>
                                                    <span>Business Email</span>
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="item phone"
                                             data-aos="fade-left" data-aos-delay="250" data-aos-duration="900" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settingItems['phone_number']->value ?? '') }}"
                                               target="_blank"
                                               style="text-decoration: none; color: inherit;">
                                                <h6>
                                                    {{ $settingItems['phone_number']->value ?? 'No. Tlp' }}<br>
                                                    <span>Phone Number</span>
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 text-lg-end text-center mt-3 mt-lg-0">
                                <h4 class="fw-bold mb-3 mb-lg-0 d-inline-block mx-3"
                                    data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                    Let's Find Your Ideal Property
                                </h4>
                                <a href="{{ route('frontend.contact') }}"
                                    style="display: inline-block; background: #ff0000; color: #fff; padding: 10px 25px;
                                            border-radius: 25px; text-decoration: none; font-weight: 600;
                                            transition: all 0.3s ease; letter-spacing: 0.5px;"
                                    data-aos="zoom-in" data-aos-delay="150" data-aos-duration="700" data-aos-easing="ease-out-cubic" data-aos-offset="120">
                                            <i class="fa fa-phone"></i>
                                    Hubungi kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection