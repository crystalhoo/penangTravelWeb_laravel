<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2>About TRAVEL</h2>
        <p>{{ $settings['about_description'] ?? '' }}</p>
      </div>
      <div class="col-lg-3">
        <h3>Location</h3>
        <p>{!! $settings['contact_address'] ?? '' !!}</p><br>
        <strong>Phone:</strong> {{ $settings['contact_phone'] }}<br>
        <strong>Email:</strong> {{ $settings['contact_email'] }}<br>
      </div>
    </div>
  </div>
</section>
