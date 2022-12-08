@section('gallery', 'active')
@section('title', 'Gallery')

@section('meta')
    <title>{{ $setting->website_title }} - @yield('title')</title>
    <meta name="description" content="{!! $page->description !!}" />

    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:description" content="{!! $page->description !!}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('about-us.index') }}" />
    <meta property="og:image" content="{{ asset($page->cover_image) }}" />

    <meta name="twitter:title" content="{{ $page->title }}">
    <meta name="twitter:description" content="{!! $page->description !!}">
    <meta name="twitter:image" content="{{ asset($page->cover_image) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('email', $setting->email)
@section('phone', $setting->phone)
@section('address', $setting->address)
@section('logo', asset($setting->logo))
@section('facebook', $setting->facebook)
@section('twitter', $setting->twitter)
@section('instagram', $setting->instagram)
@section('youtube', $setting->youtube)
@section('whatsapp_number', $setting->whatsapp_number)

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

@push('css')
    <style>
        .masthead {
            height: 100vh;
            height: 500px;
            background-image: url('{{ asset($page->banner_image) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
@endpush

<x-guest-layout>
    <header class="masthead">
        <div class="h-100 container">
            <div class="row h-100 align-items-center">
            </div>
        </div>
    </header>

    <section class="container py-5">
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
                    <img src="{{ asset($g->cover_image) }}" class="w-100 mx-1 my-2">
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
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
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
