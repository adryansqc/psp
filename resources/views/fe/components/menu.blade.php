<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo" style="display:inline-flex;align-items:center;text-decoration:none;">
                        <img src="{{ asset('dummypsp') }}/assets/images/Logo_psp.png" alt="PSP Logo" style="height:80px;width:auto;object-fit:contain;display:block;margin-top:-10px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('frontend.home') }}" class="{{ Request::routeIs('frontend.home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{ route('frontend.about') }}" class="{{ Request::routeIs('frontend.about') ? 'active' : '' }}">About</a></li>
                        <li><a href="" class="">Project</a></li>
                        <li><a href="{{ route('frontend.contact') }}" class="{{ Request::routeIs('frontend.contact') ? 'active' : '' }}">Contact Us</a></li>
                        <li><a href="#" class="{{ Request::is('#') ? 'active' : '' }}"><i class="fa fa-calendar"></i> Contact Now</a></li>
                  </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>