@section('home', 'active')
@section('title', 'Home')

@section('meta')
    <title>{{ $setting->website_title }} - @yield('title')</title>
    <meta name="description" content="{!! $setting->website_description !!}" />

    <meta property="og:title" content="{{ $setting->website_title }}" />
    <meta property="og:description" content="{!! $setting->website_description !!}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('index') }}" />
    <meta property="og:image" content="{{ asset('storage/' . $setting->logo) }}" />

    <meta name="twitter:title" content="{{ $setting->website_title }}">
    <meta name="twitter:description" content="{!! $setting->website_description !!}">
    <meta name="twitter:image" content="{{ asset('storage/' . $setting->logo) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('email', $setting->email)
@section('phone', $setting->phone)
@section('address', $setting->address)
@section('logo', asset('storage/' . $setting->logo))
@section('facebook', $setting->facebook)
@section('twitter', $setting->twitter)
@section('instagram', $setting->instagram)
@section('youtube', $setting->youtube)

@section('tour-nav')
    @foreach ($tours as $t)
        <a class="dropdown-item" href="{{ route('tour-package.show', [$t->slug]) }}">{{ $t->title }}</a>
    @endforeach
@endsection

@section('tour-footer')
    @foreach ($tours as $t)
        <li><a href="{{ route('tour-package.show', [$t->slug]) }}" class="text-decoration-none text-white">{{ $t->title }}</a></li>
    @endforeach
@endsection

@section('about_us', $setting->about_us)
@section('about_us_description', $setting->about_us_description)

<x-guest-layout>
    <!-- slider -->
    <header class="mb-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $s)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $s->order - 1 }}" @if ($s->order == '1') class="active" aria-current="true" @else @endif aria-label="Slide {{ $s->order }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $s)
                    <div class="carousel-item @if ($s->order == '1') active @else @endif" style="background-image: url('{{ asset('storage/' . $s->image) }}')">
                        <div class="container-fluid h-100 bg-dark-transparent">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 text-center">
                                    <h1 class="text-white">{{ $s->title }}</h1>
                                    <div class="line m-auto mt-3 mb-3 bg-white text-white"></div>
                                    <h2 class="fs-6 text-white">{!! $s->description !!}</h2>
                                    {{-- <a href="" class="btn btn-info px-4 mt-4 text-white">Read More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>

    <!-- 4 konten -->
    <section class="py-xl-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($tours as $t)
                    <div class="col-12 col-md-3 my-3 col-xl-3 mb-xl-4">
                        <div class="card card-img-zoom">
                            <div class="card-img-top overflow-hidden">
                                <img src="{{ asset('storage/' . $t->cover_image) }}" class="w-100 p-2" alt="...">
                            </div>
                            <div class="card-body p-4 text-center">
                                <h5 class="card-title text-uppercase">{{ $t->title }}</h5>
                                <p class="card-text">{!! $t->excerpt !!}</p>
                                <a href="{{ route('tour-package.show', [$t->slug]) }}" class="btn btn-info btn-sm text-uppercase text-white">read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- about us -->
    <section class="parallax my-5 my-xl-0" style="height: 400px; background-image: url('{{ asset('img/parallax/general-3-large.jpg') }}');">
        <div class="w-100 h-100 bg-dark-transparent">
            <div class="h-100 container">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-xl-8 text-center">
                        <h1 class="text-uppercase h2 text-white">{{ $setting->about_us }}</h1>
                        <div class="line m-auto mt-3 mb-3 bg-white text-white"></div>
                        <span class="text-white">{!! $setting->about_us_description !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- why choose us -->
    <section class="py-xl-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 text-center">
                    <h1 class="text-uppercase h2">{{ $setting->why_choose_us }}</h1>
                    <div class="line bg-dark text-dark m-auto mt-3 mb-3"></div>
                    {!! $setting->why_choose_us_description !!}
                </div>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row">
                @foreach ($why_choose_us as $wcu)
                    <div class="col-xl-4 col-md-4 my-3 my-xl-0">
                        <div class="card card-info">
                            <div class="card-body p-5 text-center">
                                <i class="{{ $wcu->font_awesome }} fa-4x mb-4"></i>
                                <h4 class="card-title text-uppercase mb-3">{{ $wcu->title }}</h4>
                                <span class="card-text">
                                    {!! $wcu->description !!}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- popular destination -->
    <section class="parallax h-auto my-5 my-xl-0" style="background-image: url('{{ asset('img/parallax/general-5-large.jpg') }}');">
        <div class="w-100 h-100 bg-dark-transparent py-5">
            <div class="h-100 container">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="text-uppercase h2 text-white">{{ $setting->popular_destination }}</h1>
                        <div class="line m-auto mt-3 mb-3 bg-white text-white"></div>
                        <span class="text-white">{!! $setting->popular_destination_description !!}</span>
                    </div>
                </div>

                <div class="row mt-5">
                    @foreach ($popular_destinations as $pd)
                        <div class="col-xl-3 col-md-3 mb-5 mb-xl-0">
                            <div class="card card-img-circle bg-transparent">
                                <div class="card-img-top border-circle position-relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $pd->cover_image) }}" class="w-100 rounded-circle" alt="...">
                                </div>
                                <div class="card-body p-4 text-center text-white">
                                    <h5 class="card-title text-uppercase my-2 my-xl-4">{{ $pd->title }}</h5>
                                    <span class="card-text border-start-0 border-end-0 border border-white py-3">
                                        {!! $pd->excerpt !!}
                                    </span>
                                    {{-- <h5 class="py-3">$200</h5> --}}
                                    <a href="{{ route('tour-package.show', [$pd->slug]) }}" class="btn btn-light text-dark text-uppercase px-4">read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- latest news -->
    <section class="py-xl-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 text-center">
                    <h1 class="text-uppercase h2">{{ $setting->latest_news }}</h1>
                    <div class="line bg-dark text-dark m-auto mt-3 mb-3"></div>
                    {!! $setting->latest_news_description !!}
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        @foreach ($latest_news as $ln)
                            <div class="col-xl-4 col-md-4">
                                <div class="card mb-4 mb-xl-5 bg-white bg-xl-transparent">
                                    <div class="row g-0">
                                        <div class="col-xl-4 mb-3 mb-xl-0">
                                            <img src="{{ asset('storage/' . $ln->cover_image) }}" class="w-100" alt="...">
                                        </div>
                                        <div class="col-xl-8 pt-lg-2">
                                            <div class="card-body py-0">
                                                <span class="card-title text-uppercase fs-6">{{ Str::limit($ln->title, 15) }}</span>
                                                <span class="card-text">
                                                    <small class="text-muted d-block">
                                                        {!! Str::limit($ln->excerpt, 50) !!}
                                                    </small>
                                                </span>
                                                <a href="{{ route('blog.show', [$ln->slug]) }}" class="btn btn-sm btn-info text-uppercase px-4 text-white mt-3 mt-lg-1">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimoni -->
    <section class="parallax my-5 my-xl-0" style="height: 400px; background-image: url('{{ asset('img/parallax/general-6-large.jpg') }}');">
        <div class="w-100 h-100" style="background: rgba(0, 0, 0, 0.5)">
            <div class="h-100 container">
                <div class="row h-100 align-items-center justify-content-end">
                    <div class="col-md-7 col-xl-7">
                        <h1 class="text-uppercase h2 text-white">{{ $setting->testimonial }}</h1>
                        <div class="line mt-3 mb-3 bg-white text-white"></div>
                        {!! $setting->testimonial_description !!}
                        <div class="border border-white px-4 py-4">
                            <div class="row">
                                <div class="col-12 testimonial">
                                    @foreach ($testimonials as $t)
                                        <div>
                                            <span class="h5 text-uppercase text-white">{{ $t->name }}</span>
                                            <span class="text-white">{!! $t->comment !!}</span>
                                            <span class="text-white"><i><small>{{ $t->source }}</small></i></span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- our client --}}
    <section class="py-xl-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-10 text-center">
                    <h1 class="text-uppercase h2">{{ $setting->our_client }}</h1>
                    <div class="line bg-dark text-dark m-auto mt-3 mb-3"></div>
                    {!! $setting->our_client_description !!}
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 client">
                    @foreach ($our_clients as $oc)
                        <div class="col-4 col-xl-2 px-2">
                            <img src="{{ asset('storage/' . $oc->client_logo) }}" alt="" class="w-100">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="container-fluid bg-white py-5">
        <div class="row">
            <div class="col-xl-12 mt-3 text-center">
                <h1 class="text-uppercase h2">gallery</h1>
                <div class="line bg-dark text-dark m-auto mt-3 mb-4"></div>
            </div>

            <div class="mb-4 text-center">
                <button class="btn btn-info filter-button text-white mt-3" data-filter="all">All</button>
                @foreach ($gallery_categories as $g)
                    <button class="btn btn-info filter-button text-white mt-3" data-filter="{{ $g->id }}">{{ $g->title }}</button>
                @endforeach
            </div>
            @foreach ($galleries as $g)
                <div class="gallery_product col-6 col-md-3 col-xl-3 {{ $g->gallery_category_id }} filter">
                    <img src="{{ asset('storage/' . $g->cover_image) }}" class="w-100 mx-1 my-2">
                </div>
            @endforeach

        </div>
    </section>

    @push('js')
        <script>
            $(document).ready(function() {
                $('.testimonial').slick({
                    autoplay: true,
                });

                $('.client').slick({
                    arrows: false,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });
            });
        </script>
        <script>
            $(document).ready(function() {

                $(".filter-button").click(function() {
                    var value = $(this).attr('data-filter');

                    if (value == "all") {
                        $('.filter').show('1000');
                    } else {
                        $(".filter").not('.' + value).hide('3000');
                        $('.filter').filter('.' + value).show('3000');

                    }
                });

                if ($(".filter-button").removeClass("active")) {
                    $(this).removeClass("active");
                }
                $(this).addClass("active");

            });
        </script>
    @endpush
</x-guest-layout>
