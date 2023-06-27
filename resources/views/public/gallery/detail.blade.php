@extends('layout')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>AlbumName</li>
                </ol>
                <h2>{{ $gallery->name }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- Gallery -->
                <div class="row">
                    @foreach ($gallery->gallery as $item)

                        <div class="col-8 mb-4 mb-lg-0">
                            <div class="card-title">
                                <h4>{{ $item->title }}</h4>
                            </div>
                            <img src="{{ asset($item->image_path) }}"
                                class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                                <div class="card-footer">
                                    <p>{{ $item->description }}</p>
                                </div>
                        </div>

                        @endforeach

                </div>
                <!-- Gallery -->
            </div>
        </section>

    </main>
@endsection
