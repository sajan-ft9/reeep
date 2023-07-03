@extends('layout')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>About Us</li>
                </ol>
                <h2>About Us</h2>

            </div>
        </section><!-- End Breadcrumbs -->
            <section class="inner-page">
              @foreach ($abouts as $item)


                <div class="container mb-4">
                    <div class="container aos-init aos-animate" data-aos="fade-up">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <h1>{{ $item->title[App::getLocale()] }}</h1>
                                <img src="{{ asset($item->image_path) }}" class="img-fluid rounded-4 mb-4" alt="">
                                <p>{{ mb_substr($item->description[App::getLocale()], 0, 100) }}</p>
                            </div>
                            <div class="col-lg-6 pt-5">
                                <div class="content ps-0 ps-lg-5">
                                    <p class="fst-italic">
                                        {{ mb_substr($item->description[App::getLocale()], 100 - 1) }}
                                    </p>
                                    {{-- <div class="position-relative mt-4">
                <img src="assets/img/office.JPG" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
              </div> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                <hr>

                </div>
        @endforeach

            </section>

    </main>
@endsection
