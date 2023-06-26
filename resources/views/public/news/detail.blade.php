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
                <div class="card px-3 pt-3">
                    <!-- News block -->
                    <div>
                        <!-- Featured image -->
                        <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4"
                            data-mdb-ripple-color="light">
                            <img src="{{ asset($news->image_path) }}" class="img-fluid" style="min-width:100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>

                        <!-- Article data -->
                        <div class="row mb-3">
                            <div class="col-6">
                          
                                    <i class="fas fa-plane"></i>
                                    {{ $news->category ==1 ? "News" : "Activities" }}
                               
                            </div>

                            <div class="col-6 text-end">
                                <u> {{ $news->updated_at }}</u>
                            </div>
                        </div>

                        <!-- Article title and description -->
                    
                            <h3>{{ $news->title }}</h3>

                            <p>
                              {{$news->description}}
                            </p>
                       

                        <hr />

                        <h5>Recent News</h5>
                        <!-- News -->
                        @foreach ($recent_news as $item)
                            
                        <a href="{{ route('news.detail', $item->id) }}" class="text-dark">
                            <div class="row mb-4 border-bottom pb-2">
                                <div class="col-3">
                                    <img src="{{ asset($item->image_path) }}"
                                        class="img-fluid shadow-1-strong rounded" alt="Hollywood Sign on The Hill" />
                                </div>

                                <div class="col-9">
                                    <p class="mb-2"><strong>{{ $item->title }}</strong></p>
                                    <p>
                                        <u>Created at: {{ $item->updated_at }}</u>
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <!-- News block -->
                </div>
            </div>
        </section>

    </main>
@endsection
