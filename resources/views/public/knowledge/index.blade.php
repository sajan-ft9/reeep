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

            @php
                $color = ['yellow', 'orange', 'purple', 'green', 'blue', 'brown'];
            @endphp
            <div class="container">
                @foreach ($knowledges as $key => $item)
                    <div class="mb-5">
                        <div class="card-big-shadow">
                            <div class="card notecard card-just-text" style="width:80%;" data-background="color"
                                data-color="{{ $color[$key] }}" data-radius="none">
                                <div class="content">
                                    <h1 class="title mb-2">{{ $item->title }}</h1>
                                    @if (pathinfo($item->image_path, PATHINFO_EXTENSION) === 'pdf')
                                        <h4 class="text-dark"><a href="{{ asset($item->image_path) }}">Click here to download PDF</a></h4>
                                    @else
                                        <img src="{{ asset($item->image_path) }}" alt="" style="width: 100%">
                                    @endif
                                    <p class="description mt-4">{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            </div>
        </section>

    </main>
@endsection
