@extends('fe.layouts.app')

@section('title')
    About
@endsection

@push('style')
<style>
    .about-section,
    .vision-section,
    .values-section {
      padding: 60px 0;
      background: #fff;
    }
    .vision-section {
      background: #f9f9f9;
    }
    .section-label {
      font-size: 12px;
      font-weight: 600;
      color: #ff0000;
      text-transform: uppercase;
      letter-spacing: 2px;
      display: block;
      margin-bottom: 8px;
    }
    .section-divider {
      width: 40px;
      height: 3px;
      background: #ff0000;
      margin-bottom: 20px;
    }
    .section-divider.center {
      margin-left: auto;
      margin-right: auto;
    }
    h2.section-heading {
      font-size: 28px;
      font-weight: 700;
      color: #1d2130;
      margin-bottom: 16px;
    }
    .about-section p,
    .vision-section p {
      font-size: 15px;
      color: #555;
      line-height: 1.9;
      margin-bottom: 14px;
    }
    .about-image img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 6px;
    }
    .stats-row {
      display: flex;
      gap: 32px;
      margin-top: 28px;
      border-top: 1px solid #eee;
      padding-top: 24px;
      flex-wrap: wrap;
    }
    .stat-item h3 {
      font-size: 26px;
      font-weight: 800;
      color: #ff0000;
      margin-bottom: 2px;
    }
    .stat-item p {
      font-size: 12px;
      color: #999;
      margin: 0;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .facility-list {
      list-style: none;
      padding: 0;
      margin: 16px 0 0;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .facility-list li {
      font-size: 13px;
      color: #555;
      background: #f9f9f9;
      border: 1px solid #e8e8e8;
      border-radius: 4px;
      padding: 6px 14px;
    }
    .facility-list li i {
      color: #ff0000;
      margin-right: 6px;
      font-size: 12px;
    }
    .vision-box {
      background: #fff;
      border: 1px solid #e8e8e8;
      border-left: 4px solid #ff0000;
      border-radius: 6px;
      padding: 28px 28px;
    }
    .vision-box p {
      font-size: 16px;
      color: #333;
      line-height: 1.9;
      font-style: italic;
      margin: 0;
    }
    .value-card {
      padding: 28px 24px;
      border: 1px solid #e8e8e8;
      border-radius: 6px;
      margin-bottom: 24px;
    }
    .value-card .value-number {
      font-size: 11px;
      font-weight: 700;
      color: #ff0000;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 8px;
      display: block;
    }
    .value-card h5 {
      font-size: 15px;
      font-weight: 700;
      color: #1d2130;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .value-card p {
      font-size: 14px;
      color: #666;
      line-height: 1.8;
      margin: 0;
    }
    .text-center-label {
      text-align: center;
      margin-bottom: 40px;
    }
    .text-center-label h2,
    .text-center-label .section-label {
      text-align: center;
    }
    .text-center-label p {
      font-size: 15px;
      color: #777;
      max-width: 540px;
      margin: 0 auto;
    }
  </style>
@endpush

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / About Us</span>
          <h3>About Us</h3>
        </div>
      </div>
    </div>
  </div>

<!-- ===== TENTANG KAMI ===== -->
<div class="about-section">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-lg-6 mb-4">
        <div class="about-image">
          <img src="{{ asset('dummypsp') }}/assets/images/bestrumahkito.jpg" alt="Tentang PSP">
        </div>
      </div>

      <div class="col-lg-6 mb-4 ps-lg-5">
        <span class="section-label">Tentang Kami</span>
        <div class="section-divider"></div>
        <h2 class="section-heading">PT. Putra Sentosa Prakarsa</h2>
        <p>
          PT. Putra Sentosa Prakarsa (PSP) merupakan pengembang real estat yang berfokus pada
          perumahan, perkantoran, ruko, real estate, dan area komersial lainnya. Konsep utama yang
          diemban adalah menciptakan tata ruang sebagai satu kesatuan dengan kawasan terpadu
          setempat, serta pola tata hijau dan asri — nyata tertuang pada <strong>Puri Mayang</strong>.
        </p>
        <p>
          PSP berani menjadi pelopor perumahan Real Estate Resort pertama yang terbaik dan termewah
          di kawasan ini, melihat potensi Jambi yang ke depannya akan semakin baik. PSP dikenal
          sebagai pengembang besar dan terpercaya dengan keunggulan kualitas produk dan legalitas
          terjamin.
        </p>
        <p>
          PT. PSP telah menjalin kerja sama dengan berbagai bank pemerintah dan bank umum nasional
          untuk memberikan kemudahan pembiayaan bagi masyarakat dalam memiliki produk properti.
        </p>

        <p style="font-size:14px;font-weight:600;color:#1d2130;margin-bottom:8px;">Fasilitas Kawasan:</p>
        <ul class="facility-list">
          <li><i class="fa fa-mosque"></i> Rumah Ibadah</li>
          <li><i class="fa fa-tree"></i> Taman Bermain</li>
          <li><i class="fa fa-running"></i> Sarana Olahraga</li>
          <li><i class="fa fa-store"></i> Pasar Modern</li>
          <li><i class="fa fa-shield-alt"></i> Security 24 Jam</li>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- ===== VISI ===== -->
<div class="vision-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center mb-4">
        <span class="section-label">Visi</span>
        <div class="section-divider center"></div>
        <h2 class="section-heading">Visi Kami</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="vision-box">
          <p>
            "Terpercaya dan terdepan serta bersinergi untuk menyediakan properti dan/atau jasanya
            yang memberikan nilai tambah lebih bagi konsumen."
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ===== CORE VALUES ===== -->
<div class="values-section">
  <div class="container">
    <div class="text-center-label">
      <span class="section-label">Core Values</span>
      <div class="section-divider center"></div>
      <h2 class="section-heading">Nilai-Nilai Kami</h2>
    </div>

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <span class="value-number">01</span>
          <h5>Integritas</h5>
          <p>Lakukan apa yang sudah dikatakan.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <span class="value-number">02</span>
          <h5>Proaktif</h5>
          <p>Bertanggung jawab terhadap masa lalu, sekarang & masa depan.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <span class="value-number">03</span>
          <h5>Cepat Bertindak</h5>
          <p>Kalau bisa sekarang, kenapa nanti.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <span class="value-number">04</span>
          <h5>Peningkatan Terus Menerus</h5>
          <p>Hari ini lebih baik dari kemarin, besok lebih baik dari hari ini.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <span class="value-number">05</span>
          <h5>Sinergi</h5>
          <p>1 + 1 &gt; 2 — Bersama kita lebih kuat dan menghasilkan lebih banyak.</p>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection