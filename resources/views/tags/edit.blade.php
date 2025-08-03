@extends('layouts.base')

@section('title', 'Editar etiqueta')

@section('content')
<div class="container mt-5">
    <h2>Editar etiqueta</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la etiqueta</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $tag->name) }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
