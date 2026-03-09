<div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i>{{ $settingItems['email']->value ?? 'Email Perusahaan' }}</li>
            <li><i class="fa fa-map"></i> Jambi, Indonesia</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="{{ $settingItems['facebook']->value ?? '#' }}"><i class="fab fa-facebook"></i></a></li>
            <li><a href="{{ $settingItems['x']->value ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="{{ $settingItems['linkedin']->value ?? '#' }}"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="{{ $settingItems['instagram']->value ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
</div>