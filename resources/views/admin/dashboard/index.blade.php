@section('title', 'Dashboard')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-0 ms-2">
        <li class="breadcrumb-item">
            <span><a href="{{url('/dashboard')}}" class="text-dark">Home</a></span>
        </li>
        <li class="breadcrumb-item active">
            <span>@yield('title')</span>
        </li>
    </ol>
</nav>
@endsection
<x-app-layout>
    <div class="container-fluid">
    </div>
</x-app-layout>