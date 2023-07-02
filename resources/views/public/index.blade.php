<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>REEEP</title>
    <meta name="keywords"
        content="Energy, efficiency, Nepal, households, industries, clean energy, improved, cook stove, strategy">
    <meta content="" name="keywords">
    <meta name="description"
        content="Renewable Energy and Energy Efficiency Programme (REEEP) is being implemented in Nepal since 2021.">

    @vite('resources/js/app.js')

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/cardflip.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/notecard.css') }}">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="mx-2">
            <div class="row">
                <div class="d-flex align-items-center justify-content-lg-between">
                    <a href="/" class="logo image-fluid"><img src="{{ asset('assets/img/gov.png') }}"
                            alt=""></a>

                    <h1 class="logo me-auto me-lg-0"><a href="/">REEEP</a>
                        <p style="font-size:6px" class="text-white">Renewable Energy and Energy Efficiency Programme</p>
                    </h1>

                    <nav id="navbar" class="navbar order-last order-lg-0">
                        @include('partials.homemenu')
                    </nav><!-- .navbar -->
                    <a href="/" class="logo"><img class="img-fluid d-none   d-sm-none d-md-block"
                            src="assets/img/nepal-germany.jpg" alt=""></a>
                    <a href="/" class="logo"><img class="img-fluid d-none   d-sm-none d-md-block"
                            src="assets/img/giz.png" alt=""></a>
                </div>
            </div>

        </div>
    </header>
    <!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($data['banners'] as $item)
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="{{ asset($item->image_path) }}" class="d-block w-100" style="height: 100vh"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>{{ $item->title }}</h1>
                        <h3>{{ $item->description }}</h3>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- End Hero -->

    <main id="main">

        <!-- </section> -->
        <!-- ======= About Us Section ======= -->
        <div id="about" class="section-title py-5 mx-5">
            <h2>
                About us
            </h2>
        </div>
        <div class="container-xxl">
            <div class="container">

                <div class="row g-5 zoom">
                    <div class="col-lg-6 ">
                        <div class="row g-2">
                            <div class="col">
                                <img class="img-fluid w-100" style="height: 100%" src="{{ asset($about->image_path) }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeIn">

                        <h2 class="mb-4">{{ $about->title }}</h2>
                        <p class="mb-4">{{ substr($about->description, 0, 350) }}....
                        </p>

                        <a class="get-started-btn  rounded-pill py-3 px-5" href="/about">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <div class="m-5 py-5">

            <div id="working" class="section-title">
                <h2>Working Areas
                    <a href="/working">
                        <span style="float: right" class="fs-5 text-success">View More</span>
                    </a>
                </h2>

            </div>

            <div class="row">
                @foreach ($data['workings'] as $item)
                    <div class="col-lg col-md-5 mb-2">
                        <div class="card flip">
                            <div class="face front-face">
                                <a href="{{ route('working.detail', $item->id) }}">
                                    <img src="{{ $item->image_path }}" alt="" class="profile">
                                </a>
                                <div class="card-title px-2 mt-2">
                                    <p>
                                        {{ $item->title }}
                                    </p>
                                </div>

                            </div>
                            <div class="face back-face">
                                <span class="fas fa-quote-left"></span>
                                <a href="{{ route('working.detail', $item->id) }}">
                                    <div class="testimonial">
                                        {{ $item->description }}
                                    </div>
                                </a>
                                <span class="fas fa-quote-right"></span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        <!-- End working Section -->
        <div class="mx-4 mb-5">

            <div id="news" class="section-title">
                <h2>News and Activities
                    <a href="/news">
                        <span style="float: right" class="fs-5 text-success">View More</span>
                    </a>
                </h2>
            </div>
            <div class="row">
                @foreach ($data['news'] as $item)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card news text-white card-has-bg click-col"
                            style="background-image:url('{{ asset($item->image_path) }}');">
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="card-body">

                                    <p class="card-meta mb-2">{{ $item->category == 1 ? 'News' : 'Activities' }}</p>
                                    <h4 class="card-title mt-0 "><a class="text-white"
                                            herf="#">{{ $item->title }}</a></h4>

                                </div>
                                <div class="card-footer">
                                    <div class="media">
                                        <div class="media-body">
                                            <small>{{ $item->updated_at }}</small>
                                            <small> <a class="btn btn-primary mx-4"
                                                    href="{{ route('news.detail', $item->id) }}"> Read more
                                                </a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- ======= Partners Section ======= -->
        <div class="mx-4 my-5">

            <div id="partners" class="section-title">
                <h2>Partners
                    <a href="/partner">
                        <span style="float: right" class="fs-5 text-success">View More</span>
                    </a>
                </h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                @foreach ($data['partners'] as $item)
                    <div class="col mb-3">
                        <div class="card-title">
                            <h5>
                                {{ $item->title }}
                            </h5>

                        </div>
                        <div class="client-logo">
                            <a href="/partner/1">
                                <img src="{{ $item->image_path }}" class="spins" height="250"
                                    style="border-radius: 30px" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        </section>
        <!-- End partners -->

        <!-- gallery -->
        <div class="mx-4 my-5">

            <div id="gallery" class="section-title">
                <h2>Gallery
                    <a href="/gallery-album">
                        <span style="float: right" class="fs-5 text-success">View More</span>
                    </a>
                </h2>
            </div>

            <div class="row gallery">
                @foreach ($data['albums'] as $item)
                @if(count($item->gallery) > 0)
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $item->id }}">
                        <div class="card bg-dark text-white">
                            <div style="height: 350px;">
                                <img src="{{ asset($item->gallery[0]->image_path) }}" class="card-img h-100 rounded"
                                    alt="Stony Beach" />
                            </div>
                            <div class="card-img-overlay gallery-overlay">

                                <h3 class="card-title">{{ $item->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alubm: {{ $item->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExampleDark{{ $item->id }}"
                                        class="carousel carousel-dark slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($item->gallery as $pic)
                                                <div class="carousel-item active" data-bs-interval="2000">
                                                    <img src="{{ $pic->image_path }}" class="d-block w-100"
                                                        alt="...">
                                                    <div class="bg-dark">
                                                        <p class="text-white px-5">
                                                            {{ $pic->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleDark{{ $item->id }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleDark{{ $item->id }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- knowledge --}}
        <div class="mx-5 my-5">

            <div id="knowledge" class="section-title">
                <h2>Knowledge and Resources
                    <a href="/knowledge">
                        <span style="float: right" class="fs-5 text-success">View More</span>
                    </a>
                </h2>
            </div>
            {{-- <div class="container"> --}}
                @php
                    $color = ['green', 'brown', 'blue'];
                @endphp
            <div class="row">
                @foreach ($data['knowledges'] as $key => $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="card-big-shadow">
                                <div class="card notecard card-just-text" style="height: 300px; overflow-y:hidden"
                                    data-background="color" data-color="{{ $color[$key] }}" data-radius="none">
                                    <div class="content">
                                        <h4 class="title">{{ $item->title }}</h4>
                                        <h4 class="category"><a href="{{ asset($item->image_path) }}" download>Download File</a></h4>
                                        <p class="description py-2">{{$item->description}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            {{--
      </div> --}}



        </div>

        <!-- ======= Contact Section ======= -->

        <div class="mx-4 my-5">

            <div id="contact" class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="container">

                <div class="row mt-2">
                    <div class="col-lg-6">
                        <iframe class="w-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d606.7115312661945!2d85.32510443121656!3d27.69731695151589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a5a2f817fb%3A0xfddefa6f02971a46!2sMinistry%20of%20Energy%2C%20Water%20Resources%20and%20Irrigation!5e0!3m2!1sen!2snp!4v1687168195856!5m2!1sen!2snp"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <div class="mt-2">
                            <h4>Location:</h4>
                            <p>{{ $location->address }}</p>
                            <div class="row">
                                <div class="col">
                                    <h4>Email:</h4>
                                    <p>{{ $location->email }}</p>

                                </div>
                                <div class="col">
                                    <h4>Website:</h4>
                                    <p>{{ $location->website }}</p>

                                </div>
                            </div>
                            <div class="col">
                                <h4>Call:</h4>
                                <p>{{ $location->call }}</p>
                        
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0">

                        <form action="{{ route('contact') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="text-center"><button class="btn btn-success mt-2" type="submit">Contact
                                    Us</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </main>

    <footer id="footer">
        {{-- <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <h3>REEEP</h3>
                    <p>Joint effort to go Green by Nepal and Germany</p>
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('assets/img/giz.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/img/nepal-germany.jpg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3>Contacts</h3>
                    <ul type="none">
                        <li>Email: {{ $location->email }}</li>
                        <li>Website: {{ $location->website }}</li>
                        <li>Tel: {{ $location->call }}</li>
                    </ul>
                </div>
                <div class="col text-start">
                    <h3>More Links</h3>
                    <ul type="none">
                        <li><a class="nav-link" href="#">Knowledge and Resources</a></li>
                        <li><a class="nav-link" href="#">Downloads and Links</a></li>
                    </ul>
                </div>
            </div>
            <div class="social-links">
                <a href="#"><i class="bx bxl-twitter"></i></a>
                <a href="#"><i class="bx bxl-facebook"></i></a>
                <a href="#"><i class="bx bxl-instagram"></i></a>
                <a href="#"><i class="bx bxl-skype"></i></a>
                <a href="#"><i class="bx bxl-linkedin"></i></a>
            </div>

        </div> --}}
        @include('partials.footer')
    </footer>
    <div class="col-4" style="position:fixed;bottom:10px; right:20px; z-index:999">
        <x-alert2 />
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


    <script src="assets/js/main.js"></script>

</body>

</html>
