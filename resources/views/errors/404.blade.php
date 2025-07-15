@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')
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

@endsection


