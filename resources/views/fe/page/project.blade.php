@extends('fe.layouts.app')

@section('title')
    Project
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
    .project-slider {
        padding: 40px 0;
    }

    .project-slide {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .project-slide img{
        width:100%;
        height:350px;
        object-fit:cover;
    }

    .project-content{
        padding:25px;
    }

    .project-content h4{
        font-size:22px;
        margin-bottom:10px;
    }

    .project-content p{
        font-size:15px;
        color:#555;
    }

    .project-btn{
        margin-top:15px;
    }

    .project-btn a{
        display:inline-block;
        padding:10px 20px;
        background:#ff5a3c;
        color:#fff;
        border-radius:6px;
        text-decoration:none;
    }
    </style>
@endpush

@section('content')
<style>
    .section {
        margin-top: 0px !important;
    }
</style>

<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  / Project</span>
          <h3>Project {{ $settingItems['site_name']->value ?? 'Site Name' }}</h3>
        </div>
      </div>
    </div>
  </div>

<div class="section best-deal project-slider">
    <div class="container">
        @if($projects->count())
        <div class="swiper projectSwiper">
            <div class="swiper-wrapper">

                @foreach ($projects as $project)
                <div class="swiper-slide">
                    <div class="project-slide">

                        <img src="{{ $project->cover ? asset('storage/' . $project->cover) : asset('assets/images/image-thumbnail.jpg') }}" alt="">

                        <div class="project-content">
                            <h4>{{ $project->nama_projek }}</h4>

                            <p>
                                {{ \Illuminate\Support\Str::limit($project->informasi,70) }}
                            </p>

                            <div class="project-btn">
                                <a href="{{ route('frontend.project', $project->uuid) }}">
                                    <i class="fa fa-calendar"></i> Selengkapnya
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
            <div style="padding-top: 50px;">
                <div class="swiper-pagination"></div>
            </div>
        </div>

        @else
            <div class="text-center">
                <h4>Coming Soon</h4>
                <p>Belum ada project yang ditampilkan disini</p>
            </div>
        @endif

    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
var swiper = new Swiper(".projectSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,

    autoplay:{
        delay:4000,
        disableOnInteraction:false
    },

    pagination:{
        el: ".swiper-pagination",
        clickable:true
    },

    navigation:{
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        768:{
            slidesPerView:2
        },
        1200:{
            slidesPerView:3
        }
    }
});
</script>
@endpush