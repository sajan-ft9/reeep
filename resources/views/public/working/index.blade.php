@extends('layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/cardflip.css') }}">
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Working</li>
                </ol>
                <div class="row">
                    <div class="col-8">
                        <h2>Working</h2>
                    </div>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    @foreach ($workings as $item)
                        <div class="col-lg-6 col-md-5 mb-4">
                            <div class="card flip">
                                <div class="face front-face">
                                    <a href="{{ route('working.detail', $item->id) }}">
                                        <img src="{{ $item->image_path }}"
                                            alt="" class="profile">
                                    </a>
                                    <div class="card-title px-2 mt-2">
                                        <p>
                                            {{$item->title}}
                                        </p>
                                    </div>
                                   
                                </div>
                                <div class="face back-face">
                                    <span class="fas fa-quote-left"></span>
                                    <a href="{{ route('working.detail', $item->id) }}">
                                        <div class="testimonial">
                                            {{$item->description}}
                                        </div>
                                    </a>
                                    <span class="fas fa-quote-right"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                </div>
            </div>
        </section>

    </main>
@endsection
