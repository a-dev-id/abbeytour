@section('title', 'Thank You')

@section('meta')
    <title>{{ $setting->website_title }} - @yield('title')</title>
    <meta name="description" content="{!! $page->description !!}" />

    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:description" content="{!! $page->description !!}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('thank-you.index') }}" />
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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fs-6 fw-bold @yield('tour-package')" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tour Package</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($tour_categories as $t)
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="{{ url('tour-package', [$t->slug]) }}">{{ $t->title }}</a>
                    <ul class="dropdown-menu">
                        @foreach (\App\Models\Tour::where('tour_category_id', '=', $t->id)->where('status', '=', '1')->get() as $data)
                            <li><a class="dropdown-item" href="{{ url('tour-package', [$t->slug, $data->slug]) }}">{{ $data->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </li>
@endsection

@section('tour-footer')
    @foreach ($tour_categories as $t)
        <li><a href="{{ url('tour-package', [$t->slug]) }}" class="text-decoration-none text-white">{{ $t->title }}</a></li>
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

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 text-center">
                    <h1 class="text-uppercase h2">{{ $page->title }}</h1>
                    <div class="line m-auto mt-3 mb-3 bg-dark text-dark"></div>
                    {!! $page->description !!}
                </div>
                <div class="col-xl-12 text-center">
                    <a href="{{ route('index') }}" class="btn btn-info text-white"><i class="fa-solid fa-arrow-left"></i> back to Home</a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
