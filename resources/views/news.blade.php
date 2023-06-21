@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/cardflip.css') }}">
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li>NEWS</li>
      </ol>
      <h2>NEWS</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card news text-white card-has-bg click-col"
            style="background-image:url('{{ asset('assets/img/gov.png') }}');">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <small class="card-meta mb-2">Thought Leadership</small>
                <h4 class="card-title mt-0 "><a class="text-white" herf="#">Goverment Lorem Ipsum Sit Amet Consectetur
                    dipisi?</a></h4>
                <small><i class="far fa-clock"></i> October 15, 2020</small>
              </div>
              <div class="card-footer">
                <div class="media">
                  <div class="media-body">
                    <h6 class="my-0 text-white d-block">Oz Coruhlu</h6>
                    <small>Director of UI/UX</small>
                    <small><a href="/news/1">View More</a></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card news text-white card-has-bg click-col"
            style="background-image:url('{{ asset('assets/img/gov.png') }}');">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <small class="card-meta mb-2">Thought Leadership</small>
                <h4 class="card-title mt-0 "><a class="text-white" herf="#">Goverment Lorem Ipsum Sit Amet Consectetur
                    dipisi?</a></h4>
                <small><i class="far fa-clock"></i> October 15, 2020</small>
              </div>
              <div class="card-footer">
                <div class="media">
                  <div class="media-body">
                    <h6 class="my-0 text-white d-block">Oz Coruhlu</h6>
                    <small>Director of UI/UX</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card news text-white card-has-bg click-col"
            style="background-image:url('{{ asset('assets/img/giz2.jpg') }}');">
            <div class="card-img-overlay d-flex flex-column">
              <div class="card-body">
                <small class="card-meta mb-2">Thought Leadership</small>
                <h4 class="card-title mt-0 "><a class="text-white" herf="#">Goverment Lorem Ipsum Sit Amet Consectetur
                    dipisi?</a></h4>
                <small><i class="far fa-clock"></i> October 15, 2020</small>
              </div>
              <div class="card-footer">
                <div class="media">
                  <div class="media-body">
                    <h6 class="my-0 text-white d-block">Oz Coruhlu</h6>
                    <small>Director of UI/UX</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection