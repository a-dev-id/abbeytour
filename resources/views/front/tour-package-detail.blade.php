@section('tour-package', 'active')
@section('title', $tour->title)

@section('meta')
    <title>{{ $setting->website_title }} - @yield('title')</title>
    <meta name="description" content="{{ $tour->description }}" />

    <meta property="og:title" content="{{ $tour->title }}" />
    <meta property="og:description" content="{!! $tour->description !!}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('about-us.index') }}" />
    <meta property="og:image" content="{{ asset($tour->cover_image) }}" />

    <meta name="twitter:title" content="{{ $tour->title }}">
    <meta name="twitter:description" content="{!! $tour->description !!}">
    <meta name="twitter:image" content="{{ asset($tour->cover_image) }}">
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
                        @foreach (\App\Models\Tour::where('tour_category_id', '=', $t->id)->get() as $data)
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
            background-image: url('{{ asset($tour->banner_image) }}');
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
                    <h1 class="text-uppercase h2">{{ $tour->title }}</h1>
                    <div class="line m-auto mt-3 mb-3 bg-dark text-dark"></div>
                    {!! $tour->description !!}
                </div>
            </div>
        </div>
    </section>

    <section class="py-xl-5">
        <div class="container">
            <div class="row">
                @foreach ($packages as $t)
                    <div class="col-12 col-md-3 my-3 col-xl-3 mb-xl-4">
                        <div class="card card-img-zoom">
                            <div class="card-img-top overflow-hidden">
                                <img src="{{ asset($t->cover_image) }}" class="w-100 p-2" alt="...">
                            </div>
                            <div class="card-body p-4 text-center">
                                <h5 class="card-title text-uppercase">{{ $t->title }}</h5>
                                <p class="card-text">{!! $t->excerpt !!}</p>
                                <button class="btn btn-info btn-sm text-uppercase text-white" data-bs-toggle="modal" data-bs-target="#packageModal">more detail</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-4 fw-bold" id="packageModalLabel">Package: {{ $t->title }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            {!! $t->description !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h3 class="fs-5 fw-bold">Destination</h3>
                                            {!! $t->destination !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="https://api.whatsapp.com/send?phone=6281353033707&text=Hi, I would like to Book *{{ $t->title }}* Package" type="button" class="btn btn-success" target="_blank"><i class="fa-brands fa-whatsapp"></i> Book Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
