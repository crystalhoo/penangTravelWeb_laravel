<section id="schedule" class="section-with-bg">
  <div class="container wow fadeInUp">
    <div class="section-header">
      <h2>Travel Packages</h2>
      <p>Travel with our best packages</p>
    </div>

    <ul class="nav nav-tabs" role="tablist">
      @foreach($schedules as $key => $day)
        <li class="nav-item">
          <a class="nav-link{{ $key === 1 ? ' active' : '' }}" href="#day-{{ $key }}" role="tab" data-toggle="tab">Day {{ $key }}</a>
        </li>
      @endforeach
    </ul>

    <!-- <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
      necessitatibus voluptatem quis labore perspiciatis quia.</h3>  -->

    <div class="tab-content row justify-content-center">
      @foreach($schedules as $key => $day)
        <div role="tabpanel" class="col-lg-9 tab-pane fade{{ $key === 1 ? ' show active' : '' }}" id="day-{{ $key }}">
          @foreach($day as $schedule)
            <div class="row schedule-item">
              <div class="col-md-2"><time>{{ \Carbon\Carbon::parse($schedule->start_time)->format("h:i A") }}</time></div>
              <div class="col-md-10">
                @if($schedule->port)
                  <div class="plans">
                    <img src="{{ $schedule->plans->photo->getUrl() }}" alt="{{ $schedule->plans->title }}">
                  </div>
                @endif
                <h4>{{ $schedule->title }} @if($schedule->plans)<span>{{ $schedule->plans->title }}</span>@endif</h4>
                <p>{{ $schedule->full_description }}</p>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>
</section>
