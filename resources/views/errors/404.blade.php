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

    <main class="main">
          <!-- Página 404 -->
<section class="page404">
    <div class="container-fluid">
        <div class="row">
            <div class="m-auto col-lg-6">
                <div class="page404__content">
                    <div class="page404__image">
                        <img src="{{ asset('assets/img/pic/error.png') }}" alt="Error 404" class="page404__img">
                    </div>
                    <div class="page404__info">
                        <h2 class="page404__title">¡Vaya! Esta página no se puede encontrar</h2>
                        <p class="page404__desc">
                            La página que estás buscando no existe o fue eliminada. Intenta usar el menú o vuelve a la página principal.
                        </p>
                        <a href="{{ route('home') }}" class="btn-custom">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




        <!--newslettre-->
       @include('partials.newletter')
    </main>

    <!--footer-->
    @include('partials.footer')

    <!--Search-form-->
    <div class="search__box">
        <div class="container-fluid">
            <div class="row">
                <div class="m-auto col-lg-6 col-md-8 col-sm-11">
                    <div class="search__content ">
                        <button type="button" class="search__box-btn-close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <form class="search__form" action="search-page.html">
                            <input type="search" class="search__form-input" value="" placeholder="What are you looking for?">
                            <button type="submit" class="search__form-btn-search">search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('partials.js')

</body>

</html>

