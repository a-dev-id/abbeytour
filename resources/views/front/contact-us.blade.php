@section('contact-us', 'active')
@section('title', 'Contact Us')

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
    {!! RecaptchaV3::initJs() !!}
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
                <div class="col-xl-8 text-center">
                    <h1 class="text-uppercase h2">{{ $page->title }}</h1>
                    <div class="line bg-dark text-dark m-auto mt-3 mb-3"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6 col-md-6 mb-5 mb-xl-0">
                    <form method="POST" action="{{ route('contact-us.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @if ($errors->has('full_name')) border-red @endif" id="full_name" name="full_name" required placeholder="Insert Full Name" value="{{ old('full_name') }}">
                        </div>
                        <div class=" mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @if ($errors->has('email')) border-red @endif" id="email" aria-describedby="emailHelp" name="email" required placeholder="Insert Email Address" value="{{ old('email') }}">
                            <div id=" emailHelp" class="form-text">We'll never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Insert Phone Number" value="{{ old('phone') }}">
                        </div>
                        <div class=" mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @if ($errors->has('message')) border-red @endif" id="message" name="message" rows="5" required placeholder="Insert Message">{{ old('message') }}</textarea>
                        </div>
                        <div class=" mb-3">
                            {!! RecaptchaV3::field('contact') !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info px-3 text-white"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                    </form>
                </div>
                <div class="col-xl-6 col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.489659268103!2d115.17841731538417!3d-8.739912493721663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24405ee450bad%3A0x99eb8a07870c38a9!2sAbbey%20Travelindo.%20PT%20-%20Bali!5e0!3m2!1sen!2sid!4v1649825462749!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
