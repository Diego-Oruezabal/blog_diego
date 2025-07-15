<!doctype html>
<html lang="es">

<head>
@include('partials.head')
</head>

<body>
    <!--loading -->
    @include('partials.loading')

    <!-- Header -->
    @include('partials.header')
    <!--/-->

    <!-- Main -->
    <main class="main">
        @yield('content')
    </main>

    <!--footer-->
    @include('partials.footer')

    <!--Search-form-->
    @include('partials.buscar')

    @include('partials.js')

</body>

</html>
