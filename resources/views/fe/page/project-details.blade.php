@extends('fe.layouts.app')

@section('title')
    Project
@endsection

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  /  Single Property</span>
          <h3>Single Property</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="{{ asset('dummypsp') }}/assets/images/bestrumahkito.jpg" alt="">
          </div>
          <div class="main-content">
            <span class="category">Type Kamar</span>
            <h4>Rumah Kito Resort, NO 0009</h4>
            <p>Get <strong>The Best comfort</strong> and refined elegance in one of the exclusive rooms at Rumah Kito Jambi, thoughtfully crafted to harmonize contemporary luxury with the calming beauty of its natural surroundings.

            <br><br>The Best choice for discerning guests, this room features spacious interiors, premium bedding, sophisticated design elements, and carefully curated amenities that ensure both privacy and indulgence, creating an atmosphere of tranquility, exclusivity, and effortless sophistication that lingers long after your stay.</p>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Best useful links ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Discover our Best Useful Links, thoughtfully curated to provide seamless access to essential information and services.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How to order ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Follow our streamlined booking process to secure your stay effortlessly and enjoy a seamless reservation experience.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why is rumah kito the best ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Because it seamlessly combines refined architecture, serene natural surroundings, and attentive hospitality into an elevated stay defined by comfort, privacy, and understated luxury.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>450 m2<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span>Contract Ready</span></h4>
              </li>
              <li>
                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Payment Process</span></h4>
              </li>
              <li>
                <img src="{{ asset('dummypsp') }}/assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
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
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Rumah Kito</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Mansion Kito</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Puri Mayang</button>
                  </li>
                </ul>
              </div>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>35 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>4</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{ asset('dummypsp') }}/assets/images/bestrumahkito.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Property</h4>
                      <p>Informasi tambahan mengenai properti di Rumah Kito Jambi mencakup detail fasilitas, tipe kamar, serta layanan eksklusif yang dirancang untuk memenuhi kebutuhan tamu secara menyeluruh.
                      <br><br>Setiap elemen properti dikembangkan dengan standar kenyamanan dan estetika tinggi untuk menghadirkan pengalaman menginap yang berkelas dan berkesan.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Reservasi Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{ asset('dummypsp') }}/assets/images/bestmansionkito.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Mansion Kito</h4>
                      <p>Informasi tambahan mengenai Mansion Kito menghadirkan detail lengkap tentang konsep hunian, fasilitas eksklusif, serta standar kenyamanan yang dirancang secara elegan dan menyeluruh. <br><br>Setiap ruang dan layanan dikurasi dengan presisi untuk menciptakan pengalaman tinggal yang privat, mewah, dan berkelas.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Reservasi Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>320 m2</span></li>
                          <li>Floor number <span>34th</span></li>
                          <li>Number of rooms <span>6</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{ asset('dummypsp') }}/assets/images/bestpurimayang.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Penthouse</h4>
                      <p>Informasi tambahan mengenai Purimayang mencakup detail hunian, fasilitas pendukung, serta konsep pengembangan yang dirancang untuk menghadirkan kenyamanan dan nilai investasi jangka panjang. <br><br>Setiap aspek properti dikembangkan dengan perencanaan matang guna memastikan kualitas, keamanan, dan lingkungan yang representatif bagi para penghuninya.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Reservasi Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection