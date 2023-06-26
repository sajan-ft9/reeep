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
                <div class="row">
                    <div class="col-8">
                        <h2>partner</h2>
                    </div>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                    @foreach ($partners as $item)
                        <div class="col mb-5">
                                <div class="card-title">
                                    <h5>
                                        {{ $item->title }}
                                    </h5>
                                    
                            </div>
                            <div class="client-logo">
                                <a href="{{ route('partner.detail', $item->id) }}">
                                    <img src="{{ $item->image_path }}" class="spins" height="250" style="border-radius: 30px"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
@endsection
