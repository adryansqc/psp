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

    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="{{ asset('dummypsp') }}/assets/images/featured.jpg" alt="">
                        <a href="property-details.html"><img src="{{ asset('dummypsp') }}/assets/images/featured-icon.png"
                                alt="" style="max-width: 60px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>| Featured</h6>
                        <h2>Best Accommodation &amp; Best View</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Best useful links ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Get <strong>the best accommodation</strong> with seamless access to essential links from
                                    Rumah Kito Jambi. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How to order?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Reserve your stay effortlessly through our official channels at Rumah Kito Jambi for a
                                    seamless and refined experience.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Why is rumah kito the best ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Because it harmonizes elegant design, tranquil surroundings, and attentive hospitality
                                    into a refined stay that exceeds expectations at every detail.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-01.png" alt=""
                                    style="max-width: 52px;">
                                <h4>35 m2<br><span>Total Flat Space</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-02.png" alt=""
                                    style="max-width: 52px;">
                                <h4>Contract<br><span>Contract Ready</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-03.png" alt=""
                                    style="max-width: 52px;">
                                <h4>Payment<br><span>Payment Process</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-04.png" alt=""
                                    style="max-width: 52px;">
                                <h4>Safety<br><span>24/7 Under Control</span></h4>
                            </li>
                        </ul>
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

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="999" data-speed="1000"></h2>
                                    <p class="count-text ">Buildings<br>Finished Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="999" data-speed="1000"></h2>
                                    <p class="count-text ">Years<br>Experience</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="999" data-speed="1000"></h2>
                                    <p class="count-text ">Awwards<br>Won 2023</p>
                                </div>
                            </div>
                        </div>
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
                        <h2>Find Your Best Deal Right Now!</h2>
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

                                            <!-- Informasi -->
                                            <div class="col-lg-3">
                                                <h4>Extra Info About {{ $project->nama_projek }}</h4>
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
        </div>
    </div>

    <div class="properties section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Project</h6>
                        <h2>Our Project</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($pinnedProjects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <a href="{{ route('frontend.project', $project->uuid) }}" class="project-image">
                                <img src="{{ $project->cover ? asset('storage/' . $project->cover) : asset('assets/images/image-thumbnail.jpg') }}"
                                    alt="">
                            </a>

                            <h4>
                                <a href="{{ route('frontend.project', $project->uuid) }}">
                                    {{ $project->nama_projek }}
                                </a>
                            </h4>

                            <ul>
                                <span>{{ \Illuminate\Support\Str::limit($project->informasi, 100) }}</span>
                            </ul>

                            <div class="main-button">
                                <a href="{{ route('frontend.project', $project->uuid) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-lg-12 text-center py-5">
                        <h5>Belum ada project</h5>
                        <p>Project akan segera ditambahkan.</p>
                    </div>
                @endforelse
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
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.176088111655!2d103.57523577472519!3d-1.6439675983407542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c60edd0c1d%3A0xae7a9989ad67837a!2sRumah%20Kito%20Resort%20Hotel%20Jambi%20by%20Waringin%20Hospitality!5e0!3m2!1sen!2sid!4v1772089929278!5m2!1sen!2sid"
                            width="100%" height="500px" frameborder="0"
                            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                            allowfullscreen=""></iframe>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item phone">
                                <h6>{{ $settingItems['phone_number']->value ?? 'No. Tlp' }}<br><span>Phone Number</span>
                                </h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item email">
                                <h6 style="margin:0;">
                                    {{ $settingItems['email']->value ?? 'Email Perusahaan' }}<br><span>Business
                                        Email</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-5">
                                          <form id="contact-form" action="" method="post">
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <fieldset>
                                                  <label for="name">Full Name</label>
                                                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                                                </fieldset>
                                              </div>
                                              <div class="col-lg-12">
                                                <fieldset>
                                                  <label for="email">Email Address</label>
                                                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                                                </fieldset>
                                              </div>
                                              <div class="col-lg-12">
                                                <fieldset>
                                                  <label for="subject">Subject</label>
                                                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                                                </fieldset>
                                              </div>
                                              <div class="col-lg-12">
                                                <fieldset>
                                                  <label for="message">Message</label>
                                                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                                </fieldset>
                                              </div>
                                              <div class="col-lg-12">
                                                <fieldset>
                                                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                                                </fieldset>
                                              </div>
                                            </div>
                                          </form>
                                        </div> -->
            </div>
        </div>
    </div>
@endsection
