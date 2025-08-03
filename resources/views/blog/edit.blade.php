@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

        <section class="banner" style="margin-bottom: 300px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner__content ">
                            <h2 class="mb-4">Editar publicación</h2>
                                                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    {{-- Título --}}
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Título</label>
                                                        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                                                    </div>

                                                    {{-- Resumen --}}
                                                    <div class="mb-3">
                                                        <label for="summary" class="form-label">Resumen</label>
                                                        <textarea name="summary" class="form-control" rows="2" required>{{ old('summary', $post->summary) }}</textarea>
                                                    </div>

                                                   {{-- Contenido --}}
                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Contenido</label>
                                                        <textarea name="content" id="content" class="form-control" rows="8" required>{{ old('content', $post->content) }}</textarea>
                                                    </div>



                                                    {{-- Imagen destacada --}}
                                                    <div class="mb-3">
                                                        <label for="featured_image" class="form-label">Imagen destacada</label>
                                                        @if ($post->featured_image)
                                                            <div class="mb-2">
                                                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Imagen actual" class="rounded img-fluid" style="max-width: 200px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" name="featured_image" class="form-control">
                                                    </div>

                                                    {{-- Categorías --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">Categorías</label>
                                                        <div class="flex-wrap gap-2 d-flex">
                                                            @foreach ($categories as $category)
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                                        class="form-check-input"
                                                                        {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <label class="form-check-label">{{ $category->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    {{-- Etiquetas --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">Etiquetas</label>
                                                        <div class="flex-wrap gap-2 d-flex">
                                                            @foreach ($tags as $tag)
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                                        class="form-check-input"
                                                                        {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <label class="form-check-label">{{ $tag->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    {{-- Estado --}}
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Estado</label>
                                                        <select name="status" class="form-control" required>
                                                            <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Borrador</option>
                                                            <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Publicado</option>
                                                        </select>
                                                    </div>

                                                    {{-- Botón --}}
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-success">Actualizar publicación</button>
                                                        <a href="{{ route('posts.list') }}" class="btn btn-secondary">Cancelar</a>
                                                    </div>
                                                </form>

                         </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.newletter')

        <!-- CKEditor CDN -->
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content', {
                height: 500,
            });
        </script>

@endsection
