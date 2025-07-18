@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')


<section class="m-top mb-60">
    <div class="container">
        <div class="row">
            <div class="m-auto col-lg-6">
                <div class="widget">
                    <h5 class="widget__title">Editar Perfil</h5>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" class="widget__form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <input type="text" class="form-control widget__form-input" name="name" placeholder="Nombre completo*" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control widget__form-input" name="email" placeholder="Correo electrónico*" value="{{ old('email', auth()->user()->email) }}" required readonly>
                            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control widget__form-input" name="password" placeholder="Nueva contraseña (opcional)">
                            @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control widget__form-input" name="password_confirmation" placeholder="Confirmar contraseña">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control widget__form-input" name="descripcion" placeholder="Descripción">{{ old('descripcion', auth()->user()->descripcion) }}</textarea>
                            @error('descripcion') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <input type="url" class="form-control widget__form-input" name="urlfacebook" placeholder="URL de Facebook" value="{{ old('urlfacebook', auth()->user()->urlfacebook) }}">
                            @error('urlfacebook') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <input type="url" class="form-control widget__form-input" name="urlinstagram" placeholder="URL de Instagram" value="{{ old('urlinstagram', auth()->user()->urlinstagram) }}">
                            @error('urlinstagram') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <input type="url" class="form-control widget__form-input" name="urlyoutube" placeholder="URL de YouTube" value="{{ old('urlyoutube', auth()->user()->urlyoutube) }}">
                            @error('urlyoutube') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                          <div class="form-group">
                                <label for="profile_image">Foto de perfil</label>
                                <input type="file" class="form-control widget__form-input" name="profile_image" accept="image/*">
                            </div>

                                @if(auth()->user()->profile_image)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" width="100" class="rounded-circle">
                                    </div>
                                @endif

                        <div class="widget__form-btn">
                            <button type="submit" class="btn-custom">Actualizar Perfil</button>
                        </div>
                    </form>

                    <div class="mt-4">
                        <a href="{{ route('password.request') }}" class="widget__form-link">¿Olvidaste tu contraseña?</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

       @include('partials.newletter')
@endsection

