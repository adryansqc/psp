@extends('fe.layouts.app')

@section('title')
    Home
@endsection

@push('style')
    <style>
        .project-image {
            display: block;
            width: 100%;
            height: 220px;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contact-content .item{
            padding: 35px 20px !important;
        }
    </style>
@endpush

@section('content')
    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Rumah Kito Resort, <em>Indonesia</em></span>
                    <h2>Hurry!<br>Get the Best Villa for you</h2>
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">
                    <span class="category">Mansion Kito, <em>Indonesia</em></span>
                    <h2>Be Quick!<br>Get the best villa in town</h2>
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">
                    <span class="category">Puri Mayang, <em>Indonesia</span>
                    <h2>Act Now!<br>Get the highest level penthouse</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="featured section" style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <img src="{{ asset('dummypsp') }}/assets/images/mansionkito.jpg"
                             alt="Putra Sentosa Prakarsa"
                             style="width: 100%; height: auto; display: block;">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content" style="padding-left: 30px;">
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
                                          border-radius: 25px; text-decoration: none; font-weight: 600;
                                          transition: all 0.3s ease; letter-spacing: 0.5px;">
                                    <i class="fa fa-arrow-right" style="margin-right: 8px;"></i>
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Video View</h6>
                        <h2>Get Closer View & Different Feeling</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="video-frame">
                        <img src="{{ asset('dummypsp') }}/assets/images/rumahkito.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=3imCL4Bk83c" target="_blank"><i class="fa fa-play"></i></a>
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
                        <h6>| Featured Projects</h6>
                        <h2>Featured Projects Putra Sentosa Prakarsa</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper">
                                <ul class="nav nav-tabs" role="tablist">
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
                                                <div style="border-radius: 8px; overflow: hidden;">
                                                    {!! $project->lokasi !!}
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                @if ($project->cover)
                                                    <img src="{{ Storage::url($project->cover) }}"
                                                        alt="{{ $project->nama_projek }}"
                                                        style="width: 100%; border-radius: 8px;">
                                                @else
                                                    <img src="{{ asset('dummypsp/assets/images/bestrumahkito.jpg') }}"
                                                        alt="{{ $project->nama_projek }}"
                                                        style="width: 100%; border-radius: 8px;">
                                                @endif
                                            </div>

                                            <div class="col-lg-3">
                                                <h4>Informasi Tentang {{ $project->nama_projek }}</h4>
                                                <p>{{ Str::limit($project->informasi, 200) }}</p>
                                                <div class="icon-button">
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
                                transition: all 0.3s ease; letter-spacing: 0.5px;">
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
                        <h6>| Contact Us</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <x-leaflet-project-map :projects="$mapProjects" />

                    <div class="cta-content mt-4">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="item email">
                                            <h6 style="margin:0;">
                                                {{ $settingItems['email']->value ?? 'Email Perusahaan' }}<br>
                                                <span>Business Email</span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="item phone">
                                            <h6>
                                                {{ $settingItems['phone_number']->value ?? 'No. Tlp' }}<br>
                                                <span>Phone Number</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 text-lg-end text-center mt-3 mt-lg-0">
                                <h4 class="fw-bold mb-3 mb-lg-0 d-inline-block mx-3">
                                    Let's Find Your Ideal Property
                                </h4>
                                <a href="{{ route('frontend.contact') }}"
                                    style="display: inline-block; background: #ff0000; color: #fff; padding: 10px 25px;
                                            border-radius: 25px; text-decoration: none; font-weight: 600;
                                            transition: all 0.3s ease; letter-spacing: 0.5px;">
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