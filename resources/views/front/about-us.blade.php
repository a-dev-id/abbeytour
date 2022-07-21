@section('about-us', 'active')
@section('title', 'About Us')

@section('meta')
    <title>{{ $setting->website_title }} - @yield('title')</title>
    <meta name="description" content="{!! $page->description !!}" />

    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:description" content="{!! $page->description !!}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('about-us.index') }}" />
    <meta property="og:image" content="{{ asset('storage/' . $page->cover_image) }}" />

    <meta name="twitter:title" content="{{ $page->title }}">
    <meta name="twitter:description" content="{!! $page->description !!}">
    <meta name="twitter:image" content="{{ asset('storage/' . $page->cover_image) }}">
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

@push('css')
    <style>
        .masthead {
            height: 100vh;
            height: 500px;
            background-image: url('{{ asset('storage/' . $page->banner_image) }}');
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
            </div>
        </div>
    </section>
</x-guest-layout>
