<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Panel Admin | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/coreui') }}/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('vendors/coreui') }}/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/coreui') }}/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('vendors/coreui') }}/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/coreui') }}/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('vendors/coreui') }}/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('vendors/coreui') }}/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('vendors/coreui') }}/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('vendors/coreui') }}/css/vendors/simplebar.css">

    <link href="{{ asset('vendors/coreui') }}/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('vendors/coreui') }}/css/examples.css" rel="stylesheet">
    <link href="{{ asset('vendors/coreui') }}/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    @stack('css')
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('vendors/coreui') }}/assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('vendors/coreui') }}/assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-title">General</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="nav-icon fa-solid fa-gauge-high"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('page')" href="{{ route('page.index') }}">
                    <i class="nav-icon fa-solid fa-file-lines"></i>
                    Page
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('tour')" href="{{ route('tour.index') }}">
                    <i class="nav-icon fa-solid fa-route"></i>
                    Tour
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('why_choose_us')" href="{{ route('why-choose-us.index') }}">
                    <i class="nav-icon fa-solid fa-thumbs-up"></i>
                    Why Choose Us
                </a>
            </li>
            <li class="nav-group @yield('blog_show')" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa-brands fa-blogger-b"></i>
                    Blog
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link @yield('category')" href="{{ route('blog.category.index') }}">
                            <i class="fa-solid fa-minus nav-icon"></i> Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('blog')" href="{{ route('blogs.index') }}">
                            <i class="fa-solid fa-minus nav-icon"></i> Blog
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('testimonial')" href="{{ route('testimonial.index') }}">
                    <i class="nav-icon fa-solid fa-comments"></i>
                    Testimonial
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('client')" href="{{ route('our-client.index') }}">
                    <i class="nav-icon fa-solid fa-handshake"></i>
                    Our Client
                </a>
            </li>
            <li class="nav-group @yield('gallery_show')" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa-solid fa-images"></i>
                    Gallery
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link @yield('gallery_category')" href="{{ route('gallery.category.index') }}">
                            <i class="fa-solid fa-minus nav-icon"></i> Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('gallery')" href="{{ route('galleries.index') }}">
                            <i class="fa-solid fa-minus nav-icon"></i> Gallery
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('slider')" href="{{ route('slider.index') }}">
                    <i class="nav-icon fa-solid fa-panorama"></i>
                    Slider
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('setting')" href="{{ route('setting.show', ['1']) }}">
                    <i class="nav-icon fa-solid fa-gears"></i>
                    Setting
                </a>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('vendors/coreui') }}/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
                <a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="{{ asset('vendors/coreui') }}/assets/brand/coreui.svg#full"></use>
                    </svg>
                </a>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('vendors/coreui') }}/assets/img/avatars/8.jpg" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>

                            {{-- <a class="dropdown-item" href="{{route('setting.index')}}">
                                <svg class="icon me-2">
                                    <use xlink:href="{{asset('vendors/coreui')}}/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings
                            </a> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="icon me-2">
                                        <use xlink:href="{{ asset('vendors/coreui') }}/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                    </svg> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                @yield('breadcrumb')
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            {{ $slot }}
        </div>
        <footer class="footer">
            <div><a href="https://coreui.io" class="text-decoration-none text-black"><b>CoreUI</b></a> © creativeLabs.</div>
            <div class="ms-auto">Code with <i class="fa-solid fa-heart"></i> by <a href="https://instagram.com/a_dev.id/" class="text-decoration-none text-black"><img src="{{ asset('img/student-grades.png') }}" alt="" style="width: 24px"><strong><span class="fs-6">dev</span></strong></a></div>
        </footer>
    </div>



    <script src="{{ asset('vendors/coreui') }}/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ asset('vendors/coreui') }}/vendors/simplebar/js/simplebar.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/unescaped-markup/prism-unescaped-markup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/normalize-whitespace/prism-normalize-whitespace.js"></script>

    <script src="{{ asset('vendors/coreui') }}/vendors/chart.js/js/chart.min.js"></script>
    <script src="{{ asset('vendors/coreui') }}/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="{{ asset('vendors/coreui') }}/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="{{ asset('vendors/coreui') }}/js/main.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('js')

</body>

</html>
