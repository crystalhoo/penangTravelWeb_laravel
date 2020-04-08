section id="plan" class="section-with-bg wow fadeInUp">

  <div class="container">
    <div class="section-header">
      <h2>Plans</h2>
      <p>Here are some plans</p>
    </div>

    <div class="row">
      @foreach($plans as $plan)
        <div class="col-lg-4 col-md-6">
          <div class="plan">

            <h3><a href="#">{{ $plan->title }}</a></h3>
            <div>
              @for($i = 0; $i < $plan->description; $i++)
                <i></i>
              @endfor
            </div>

          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>
