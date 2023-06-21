@include('components.head')
@include('components.header')

@yield('content')

@if ($title == 'Homepage')
    @include('components.banner')
@endif
@include('components.footer')
