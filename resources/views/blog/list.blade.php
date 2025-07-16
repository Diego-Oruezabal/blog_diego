@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

        <section class="banner" style="margin-bottom: 300px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner__content ">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                           <h2 class="mb-4">Mis publicaciones</h2>
                           <a href="{{ route('posts.create') }}" class="mb-3 btn btn-primary">Crear nuevo post</a>

                                    @if($posts->count())
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Título</th>
                                                    <th scope="col">Resumen</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Fecha de Publicación</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($posts as $post)
                                                    <tr>
                                                        <td>{{ $post->title }}</td>
                                                        <td>{{ Str::limit($post->summary, 50) }}</td>
                                                        <td>
                                                            <span class="badge bg-{{ $post->status == 'published' ? 'success' : 'warning' }}">
                                                                {{ ucfirst($post->status) }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'Sin publicar' }}</td>
                                                        <td>
                                                            <a href="{{ route('posts.show', [$post->id, $post->slug]) }}" class="btn btn-sm btn-info" target="_blank"><i class="bi bi-eye"></i></a>
                                                            <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pen"></i></a>
                                                            <form action="#" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este post?')"><i class="bi bi-trash3"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                                    @else
                                        <p class="text-muted">No has creado publicaciones todavía.</p>
                                    @endif


                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.newletter')
@endsection
