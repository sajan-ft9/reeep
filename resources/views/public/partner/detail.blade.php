@extends('layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/cardflip.css') }}">
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Partner</li>
                </ol>
                <h2>Partner</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="card" style="width:100%;">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="card-title">{{ $partner->title }}</h2>
                            <img src="{{ $partner->image_path }}" alt="">
                        </div>      

                        <h5 class="card-text mt-5 px-5">{{ $partner->description }}</h5>
                    </div>
                  </div>
            </div>
        </section>

    </main>
@endsection
