@extends('fe.layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  /  Contact Us</span>
          <h3>Contact Us</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>
          <p>Connect with our dedicated professionals for personalized assistance, detailed information, and seamless guidance tailored to your needs. Our experienced team is committed to delivering attentive service, ensuring every inquiry is handled with precision, discretion, and a genuine commitment to excellence.</p>
          <div class="row">
            <div class="col-lg-12">
              <div class="item phone">
                <img src="{{ asset('dummypsp') }}/assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>{{ $settingItems['phone_number']->value ?? 'No. Tlp' }}<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item email" style="display:flex; align-items:center; gap:15px;">
                <img src="{{ asset('dummypsp') }}/assets/images/email-icon.png" alt="" style="max-width:52px; flex-shrink:0;">
                <h6 style="margin:0;">{{ $settingItems['email']->value ?? 'Email Perusahaan' }}<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
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
        </div>
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.176088111655!2d103.57523577472519!3d-1.6439675983407542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c60edd0c1d%3A0xae7a9989ad67837a!2sRumah%20Kito%20Resort%20Hotel%20Jambi%20by%20Waringin%20Hospitality!5e0!3m2!1sen!2sid!4v1772089929278!5m2!1sen!2sid" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection