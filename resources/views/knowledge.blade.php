@extends('layout')
@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li>Knowledge</li>
      </ol>
      <h2>Knowledge and Resources</h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="card-big-shadow">
            <div class="card notecard card-just-text" style="height: 300px; overflow-y:hidden" data-background="color"
              data-color="blue" data-radius="none">
              <div class="content">
                <h6 class="category">Knowledge</h6>
                <h4 class="title"><a href="/knowledge">Click here to show</a></h4>
                <p class="description">What all of these have in common is that they're pulling information out of the
                  app or the service and making it relevant to the moment Lorem ipsum dolor sit amet consectetur
                  adipisicing elit. Quaerat illo itaque quis iusto rem dolor aspernatur vel quos inventore sed? Minus
                  at quae itaque rerum voluptas dolore? Ipsum, cum rerum? </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card-big-shadow">
            <div class="card notecard card-just-text" style="height: 300px; overflow-y:hidden" data-background="color"
              data-color="green" data-radius="none">
              <div class="content">
                <h6 class="category">Best cards</h6>
                <h4 class="title"><a href="#">Green Card</a></h4>
                <p class="description">What all of these have in common is that they're pulling information out of the
                  app or the service and making it relevant to the moment Lorem ipsum dolor sit amet consectetur
                  adipisicing elit. Quaerat illo itaque quis iusto rem dolor aspernatur vel quos inventore sed? Minus
                  at quae itaque rerum voluptas dolore? Ipsum, cum rerum? </p>
              </div>
            </div> <!-- end card -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card-big-shadow">
            <div class="card notecard card-just-text" style="height: 300px; overflow-y:hidden" data-background="color"
              data-color="green" data-radius="none">
              <div class="content">
                <h6 class="category">Best cards</h6>
                <h4 class="title"><a href="#">Green Card</a></h4>
                <p class="description">What all of these have in common is that they're pulling information out of the
                  app or the service and making it relevant to the moment. </p>
              </div>
            </div> <!-- end card -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card-big-shadow">
            <div class="card notecard card-just-text" style="height: 300px; overflow-y:hidden" data-background="color"
              data-color="orange" data-radius="none">
              <div class="content">
                <h6 class="category">PDF</h6>
                <h4 class="title"><a href="#">List page</a></h4>
                <p class="description">What all of these have in common is that they're pulling information out of the
                  app or the service and making it relevant to the moment. </p>
              </div>
            </div> <!-- end card -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection