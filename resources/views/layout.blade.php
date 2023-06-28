<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>REEEP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    @vite('resources/js/app.js')
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/notecard.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
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

    @yield('content')

    <footer id="footer">
        <div class="container">
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
                        <li>Email: info@moen.gov.np</li>
                        <li>Website: www.moen.gov.np</li>
                        <li>Tel: +977 (1) 4211516</li>
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

        </div>
    </footer>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>


    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
