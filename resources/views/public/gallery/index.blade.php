@extends('layout')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Gallery - Albums</li>
                </ol>
                <h2>Gallery - Albums</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <!-- Gallery -->
                <div class="row">
                    @foreach ($albums as $item)
                        @if (count($item->gallery) > 0)
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <h2>{{ $item->name }}</h2>
                                <div style="height: 250px">
                                    <a href="{{ route('gallery.detail', $item->id) }}"><img style="height: 100%"
                                            src="{{ $item->gallery[0]->image_path }}"
                                            class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                                    </a>
                                </div>

                            </div>
                        @endif
                    @endforeach

                </div>
                <!-- Gallery -->
            </div>
        </section>

    </main>
@endsection
