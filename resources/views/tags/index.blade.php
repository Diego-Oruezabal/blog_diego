@extends('layouts.base')

@section('title', 'Etiquetas')

@section('content')
<div class="container mt-5">
    <h2>Etiquetas</h2>
    <a href="{{ route('tags.create') }}" class="mb-3 btn btn-primary">Nueva etiqueta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta etiqueta?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
