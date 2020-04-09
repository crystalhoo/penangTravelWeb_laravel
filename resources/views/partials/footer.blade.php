<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <strong><font size="25">{{ env('APP_NAME') }}</font></strong>
          <p>{{ $settings['footer_description'] ?? '' }}</p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#about">About Us</a></li>
            @guest
              <li><i class="fa fa-angle-right"></i> <a href="{{ route('login') }}">Login</a></li>
            @endguest
            @auth
              <li><i class="fa fa-angle-right"></i> <a href="{{ route('admin.home') }}">Admin Panel</a></li>
            @endauth
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
            {!! $settings['footer_address'] ?? '' !!}<br>
            <strong>Phone:</strong> {{ $settings['contact_phone'] }}<br>
            <strong>Email:</strong> {{ $settings['contact_email'] }}<br>
          </p>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>{{ env('APP_NAME') }}</strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- #footer -->
