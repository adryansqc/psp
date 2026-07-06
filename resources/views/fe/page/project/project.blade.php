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

    /* Search Box */
    .project-search-wrapper{
        max-width:500px;
        margin:0 auto 20px auto;
    }

    .project-search-wrapper input{
        width:100%;
        padding:12px 18px;
        border-radius:30px;
        border:1px solid #ddd;
        font-size:15px;
        outline:none;
    }

    .project-search-wrapper input:focus{
        border-color:#ff5a3c;
    }

    .project-empty{
        text-align:center;
        padding:40px 0;
        display:none;
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

        <div class="project-search-wrapper">
            <input type="text" id="projectSearchInput" placeholder="Cari nama project...">
        </div>

        @if($projects->count())
        <div class="swiper projectSwiper">
            <div class="swiper-wrapper" id="projectSwiperWrapper">
            </div>
            <div style="padding-top: 50px;">
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="project-empty" id="projectEmpty">
            <h4>Tidak ditemukan</h4>
            <p>Project yang kamu cari tidak ada</p>
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
const allProjects = [
    @foreach ($projects as $project)
    {
        nama: @json($project->nama_projek),
        informasi: @json(\Illuminate\Support\Str::limit($project->informasi, 70)),
        cover: @json($project->cover ? asset('storage/' . $project->cover) : asset('assets/images/image-thumbnail.jpg')),
        url: @json(route('frontend.project', $project->uuid))
    },
    @endforeach
];

let projectSwiper = null;

function renderSlides(data) {
    const wrapper = document.getElementById('projectSwiperWrapper');
    const emptyState = document.getElementById('projectEmpty');

    if (!wrapper) return;

    wrapper.innerHTML = '';

    if (data.length === 0) {
        if (emptyState) emptyState.style.display = 'block';
        document.querySelector('.projectSwiper').style.display = 'none';
        return;
    } else {
        if (emptyState) emptyState.style.display = 'none';
        document.querySelector('.projectSwiper').style.display = 'block';
    }

    data.forEach(function (project) {
        const slide = document.createElement('div');
        slide.classList.add('swiper-slide');

        slide.innerHTML = `
            <div class="project-slide">
                <img src="${project.cover}" alt="">
                <div class="project-content">
                    <h4>${project.nama}</h4>
                    <p>${project.informasi}</p>
                    <div class="project-btn">
                        <a href="${project.url}">
                            <i class="fa fa-calendar"></i> Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        `;

        wrapper.appendChild(slide);
    });
}

function initSwiper() {
    if (projectSwiper) {
        projectSwiper.destroy(true, true);
    }

    projectSwiper = new Swiper(".projectSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: false,

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
}

function rebuildSwiper(data) {
    renderSlides(data);
    initSwiper();
}

document.addEventListener('DOMContentLoaded', function () {
    rebuildSwiper(allProjects);

    const searchInput = document.getElementById('projectSearchInput');

    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const keyword = this.value.toLowerCase().trim();

            const filtered = allProjects.filter(function (project) {
                return project.nama.toLowerCase().includes(keyword)
                    || project.informasi.toLowerCase().includes(keyword);
            });

            rebuildSwiper(filtered);
        });
    }
});
</script>
@endpush