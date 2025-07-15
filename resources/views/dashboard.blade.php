@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

        <section class="banner" style="margin-bottom: 300px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="banner__content ">
                            <h3 class="banner__title">Bienvenido,  <span class="banner__category-color"> {{ auth()->user()->name }} </span></h3>
                            <p class="banner__subtitle"> {{ auth()->user()->descripcion }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       @include('partials.newletter')
@endsection
