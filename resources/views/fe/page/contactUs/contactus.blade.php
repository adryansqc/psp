@extends('fe.layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Contact Us</span>
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6>| Office Location</h6>
                        <h2>Kunjungi Lokasi Kami</h2>
                    </div>
                    <x-leaflet-project-map :projects="$mapProjects" />
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>| Business Hours</h6>
                        <h2>Jam Operasional Kami</h2>
                    </div>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <span>Senin - Jumat</span>
                            <span>09:00 - 17:00</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <span>Sabtu</span>
                            <span>09:00 - 14:00</span>
                        </li>
                        <li class="d-flex justify-content-between py-2">
                            <span>Minggu / Hari Libur Nasional</span>
                            <span>Tutup</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6>| FAQ</h6>
                        <h2>Pertanyaan yang Sering Diajukan</h2>
                    </div>

                    @if($faqs->count())
                    <div class="accordion" id="faqAccordion">
                        @foreach ($faqs as $key => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading{{ $key }}">
                                    <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapse{{ $key }}"
                                        aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                        aria-controls="faqCollapse{{ $key }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="faqCollapse{{ $key }}"
                                    class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                    aria-labelledby="faqHeading{{ $key }}"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                        <p>Belum ada FAQ yang ditampilkan.</p>
                    @endif
                </div>
            </div>

            @php
                $phoneRaw = $settingItems['phone_number']->value ?? '';
                $phoneClean = preg_replace('/[^0-9]/', '', $phoneRaw);

                if (str_starts_with($phoneClean, '0')) {
                    $phoneClean = '62' . substr($phoneClean, 1);
                }

                $waLink = $phoneClean
                    ? 'https://wa.me/' . $phoneClean . '?text=' . urlencode('Halo, saya ingin melakukan konsultasi.')
                    : '#';
            @endphp

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="cta-box p-5" style="background:#ff5a3c; border-radius:12px;">
                        <h3 class="text-white mb-3">Jadwalkan Konsultasi Bersama Kami</h3>
                        <p class="text-white mb-4">
                            Tim kami siap membantu menjawab pertanyaan Anda dan memberikan panduan terbaik.
                        </p>
                        <a href="{{ $waLink }}" target="_blank" class="orange-button" style="background:#fff; color:#ff5a3c; padding: 15px 35px; border-radius: 10px;">
                            <i class="fab fa-whatsapp"></i> Schedule Consultation
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection