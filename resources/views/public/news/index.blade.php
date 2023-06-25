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
                <div class="row">
                    <div class="col-8">
                        <h2>NEWS</h2>
                    </div>
                    <div class="col-4">

                        <span>
                            <form action="/news">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="search" id="">
                                            <option value="">Select category</option>
                                            <option value="">All</option>
                                            <option value="1">News</option>
                                            <option value="2">Activites</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success btn-sm"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
    
                            </form>
                        </span>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="card news text-white card-has-bg click-col"
                                style="background-image:url('{{ asset($item->image_path) }}');">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">

                                        <small
                                            class="card-meta mb-2">{{ $item->category == 1 ? 'News' : 'Activities' }}</small>
                                        <h4 class="card-title mt-0 "><a class="text-white"
                                                herf="#">{{ $item->title }}</a></h4>
                                        <small><i class="far fa-clock"></i>{{ $item->updated_at }}</small>


                                    </div>
                                    <div class="card-footer">
                                        <div class="media">
                                            <div class="media-body">
                                                <small>{{ $item->updated_at }}</small>
                                                <small> <a class="btn btn-primary mx-4"
                                                        href="{{ route('news.detail', $item->id) }}"> Read more </a></small>
                                            </div>
                                        </div>
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
