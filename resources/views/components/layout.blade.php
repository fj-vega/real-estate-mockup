@include('_header')

<header>
    <navbar color="{{ $navbarColor }}"></navbar>
</header>

<main>{{ $slot }}</main>

@include('_footer')