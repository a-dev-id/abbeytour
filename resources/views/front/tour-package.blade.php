@section('tour-package', 'active')
@section('title', $tour_category->title)

@section('meta')
    <title>{{ $setting->website_title }} - @yield('title')</title>
    <meta name="description" content="{{ $tour_category->description }}" />

    <meta property="og:title" content="{{ $tour_category->title }}" />
    <meta property="og:description" content="{!! $tour_category->description !!}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('about-us.index') }}" />
    <meta property="og:image" content="{{ asset($tour_category->cover_image) }}" />

    <meta name="twitter:title" content="{{ $tour_category->title }}">
    <meta name="twitter:description" content="{!! $tour_category->description !!}">
    <meta name="twitter:image" content="{{ asset($tour_category->cover_image) }}">
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
            background-image: url('{{ asset($tour_category->banner_image) }}');
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
                    <h1 class="text-uppercase h2">{{ $tour_category->title }}</h1>
                    <div class="line m-auto mt-3 mb-3 bg-dark text-dark"></div>
                    {!! $tour_category->description !!}
                </div>
            </div>
        </div>
    </section>

    <section class="py-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($tours as $t)
                    <div class="col-12 col-md-4 my-3 col-xl-4 mb-xl-4">
                        <div class="card card-img-zoom">
                            <div class="card-img-top overflow-hidden">
                                <img src="{{ asset($t->cover_image) }}" class="w-100 p-2" alt="...">
                            </div>
                            <div class="card-body p-4 text-center">
                                <h5 class="card-title text-uppercase">{{ $t->title }}</h5>
                                <p class="card-text">{!! $t->excerpt !!}</p>
                                <a href="{{ url('tour-package', [$tour_category->slug, $t->slug]) }}" class="btn btn-info btn-sm text-uppercase text-white">read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
