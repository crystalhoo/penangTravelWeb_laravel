<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2>About The Event</h2>
        <p>{{ $settings['about_description'] ?? '' }}</p>
      </div>
      <!--
      <div class="col-lg-3">
        <h3>Where</h3>
        <p>{!! $settings['about_where'] ?? '' !!}</p>
      </div> -->
      <div class="col-lg-3">
        <h3>Location</h3>
        <p>{!! $settings['contact_address'] ?? '' !!}</p><br>
        <strong>Phone:</strong> {{ $settings['contact_phone'] }}<br>
        <strong>Email:</strong> {{ $settings['contact_email'] }}<br>
      </div>
    </div>
  </div>
</section>
