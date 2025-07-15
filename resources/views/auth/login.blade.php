@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

        <section class="m-top mb-60">
            <div class="container">
                <div class="row">
                    <div class="m-auto col-lg-6">
                    <div class="widget">
                        <h5 class="widget__title">Acceso</h5>
                        <form method="POST" action="{{ route('login') }}" class="widget__form">
                                @csrf

                                <div class="form-group">
                                    <input type="email" class="form-control widget__form-input" placeholder="Correo electrónico*" name="email" value="{{ old('email') }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control widget__form-input" placeholder="Contraseña*" name="password" required>
                                </div>

                                <div class="widget__form-controls form-group">
                                    <div class="widget__form-controls-checkbox">
                                        <input type="checkbox" class="widget__form-controls-input" id="rememberMe" name="remember">
                                        <label class="widget__form-controls-label" for="rememberMe">Recuérdame</label>
                                    </div>
                                </div>

                                <div class="widget__form-btn">
                                    <button type="submit" class="btn-custom">Iniciar sesión</button>
                                </div>

                                <p class="widget__form-text">
                                    ¿No tienes una cuenta?
                                    <a href="{{ route('register') }}" class="widget__form-link">Crea una</a>
                                </p>
                            </form>

                    </div>
                    </div>

                </div>

            </div>
        </section>

        @include('partials.newletter')

@endsection



