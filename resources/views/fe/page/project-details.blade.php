@extends('fe.layouts.app')

@section('title')
    {{ $project->nama_projek }}
@endsection

@push('style')
    <style>
        #projectGalleryCarousel img{
            height: 700px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  / Project</span>
          <h3>{{ $project->nama_projek }}</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-image">
            <img src="{{ $project->cover ? asset('storage/' . $project->cover) : asset('assets/images/bestrumahkito.jpg') }}" alt="">
          </div>
          <div class="main-content">
            <h4>INFORMASI</h4>
            <p>{{ $project->informasi }}</p>
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
            <h6>| Best Deal</h6>
            <h2>{{ $project->nama_projek }}</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Fasilitas</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Lokasi</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Galeri</button>
                  </li>
                </ul>
              </div>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-12 info-table">
                      <h4>Fasilitas {{ $project->nama_projek }}</h4>
                      <p>{{ $project->fasilitas }}</p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-12 info-table">
                      <h4>Lokasi {{ $project->nama_projek }}</h4>
                      <p>{!! $project->lokasi !!}</p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                    @if($project->galleries->count())
                    <div id="projectGalleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($project->galleries as $key => $gallery)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img
                                        src="{{ asset('storage/' . $gallery->gambar) }}"
                                        class="d-block w-100 rounded"
                                        alt="Gallery {{ $project->nama_projek }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#projectGalleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#projectGalleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    @else
                        <p>Belum ada gallery project.</p>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection