@extends('layouts.base')

@section('title', 'Crear categoría')

@section('content')
<div class="container mt-5">
    <h2>Crear nueva categoría</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoría</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
