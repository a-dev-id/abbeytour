<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    @yield('meta')

    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 14px;
        }

        .logo {
            width: 200px;
        }

        a.active {
            color: #007bff !important;
        }

        .carousel-item {
            height: 100vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .img-circle {
            border: 5px solid #fff;
            border-radius: 50%;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            width: 250px;
            height: 250px;
            margin: auto;
        }

        .inner-circle {
            background: #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: auto;
        }

        .bg-dark {
            background-color: #101112 !important;
        }

        .link-info {
            color: #fff;
        }

        .nav-link:hover {
            color: #0263ca !important;
        }

        .bg-dark-transparent {
            background: rgba(0, 0, 0, 0.3);
        }

        .line:not([size]) {
            height: 3px;
        }

        .line {
            border: 0;
            width: 70px;
        }

        .btn {
            border-radius: 0;
            ;
        }

        .card {
            border: 0px;
            border-radius: 0px;
        }

        .bg-light {
            background-color: #eef2f7 !important;
        }

        .card-img-zoom .card-img-top img {
            transition: all 0.3s;
        }

        .card-img-zoom:hover .card-img-top img {
            transition: all 0.3s;
            transform: scale(1.2);
        }

        .card-img,
        .card-img-top {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }

        .card-info:hover {
            background-color: #007bff;
            color: #fff;
        }

        .card-info:hover .card-body a.btn-info {
            background-color: #fff !important;
            color: #000 !important;
        }

        .border-circle {
            border: 8px solid #fff;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .card-img-circle .card-img-top img {
            transition: all 0.3s;
        }

        .card-img-circle:hover .card-img-top img {
            transition: all 0.3s;
            transform: scale(1.2);
        }

        .card-img-circle:hover .border-circle {
            border: 8px solid #007bff;
            border-radius: 50%;
        }

        .card-img-circle:hover .card-body a.btn-light {
            background-color: #007bff !important;
            color: #fff !important;
            border: 1px solid #007bff !important;
        }

        .circle-on-img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            background-color: #fff;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .card-overlay:hover .card-img-overlay {
            opacity: 1 !important;
        }

        .bg-info-transparent {
            background-color: rgba(13, 202, 240, 0.8);
            transition: .3s ease;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }

        .btn-info {
            color: #000;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-info:hover {
            color: #000;
            background-color: #0263ca;
            border-color: #0263ca;
        }

        @media (min-width: 320px) and (max-width: 480px) {

            .logo {
                width: 150px;
            }

        }

    </style>

    @stack('css')
</head>

<body class="bg-light">
    <!-- nav -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="col-12 col-md-6 text-center text-md-start py-2">
                <a href="mailto:@yield('email')" class="link-info text-decoration-none"><i class="fa-solid fa-envelope"></i>
                    @yield('email')
                </a>
                <a href="tel:@yield('phone')" class="link-info text-decoration-none ms-3"><i class="fa-solid fa-phone"></i> @yield('phone')</a>
            </div>
            <div class="col-12 col-md-6 text-center text-md-end py-2 text-end">
                <a href="@yield('facebook')" class="link-info text-decoration-none ms-3"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="@yield('twitter')" class="link-info text-decoration-none ms-3"><i class="fa-solid fa-location-dot"></i></a>
                <a href="@yield('instagram')" class="link-info text-decoration-none ms-3"><i class="fa-brands fa-instagram"></i></a>
                <a href="@yield('youtube')" class="link-info text-decoration-none ms-3"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </nav>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="@yield('logo')" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-lg-0 mb-2">
                    <li class="nav-item">
                        <a class="nav-link fs-6 fw-bold @yield('home')" aria-current="page" href="{{ route('index') }}" data-turbolinks="true">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-6 fw-bold @yield('tour-package')" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tour Package</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @yield('tour-nav')
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 fw-bold @yield('about-us')" href="{{ route('about-us.index') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 fw-bold @yield('blog')" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 fw-bold @yield('gallery')" href="{{ route('gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 fw-bold @yield('contact-us')" href="{{ route('contact-us.index') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <!-- footer -->
    <footer class="w-100 bg-secondary">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 px-4 text-white">
                    <h1 class="h3">About Us</h1>
                    <hr>
                    @yield('about_us_description')
                </div>
                <div class="col-xl-4 col-md-4 px-4 py-5 py-md-0 text-white">
                    <h1 class="h3">Tour Package</h1>
                    <hr>
                    <ul>
                        @yield('tour-footer')
                    </ul>
                </div>
                <div class="col-xl-4 col-md-4 px-4 text-white">
                    <h1 class="h3">Contact Us</h1>
                    <hr>
                    <div class="d-block d-flex my-2">
                        <i class="fa-solid fa-location-dot me-3 mt-1"></i> @yield('address')
                    </div>
                    <div class="d-block my-2">
                        <i class="fa-solid fa-phone me-2"></i> @yield('phone')
                    </div>
                    <div class="d-block my-2">
                        <i class="fa-solid fa-envelope me-2"></i> @yield('email')
                    </div>
                    <div class="d-flex mt-4">
                        <a href="@yield('facebook')" class="text-white">
                            <i class="fa-brands fa-facebook-square me-3 fa-2x"></i>
                        </a>
                        <a href="@yield('twitter')" class="text-white">
                            <i class="fa-solid fa-location-dot me-3 fa-2x"></i>
                        </a>
                        <a href="@yield('instagram')" class="text-white">
                            <i class="fa-brands fa-instagram me-3 fa-2x"></i>
                        </a>
                        <a href="@yield('youtube')" class="text-white">
                            <i class="fa-brands fa-youtube me-3 fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="w-100 bg-black text-white">
        <div class="container py-3">
            <div class="row">
                <div class="col-xl-6">Copyright © 2022. All rights reserved</div>
            </div>
        </div>
    </footer>

    <a href="https://api.whatsapp.com/send?phone=@yield('whatsapp_number')" class="float" target="_blank">
        <i class="fa-brands fa-whatsapp my-float"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    @stack('js')
</body>

</html>
