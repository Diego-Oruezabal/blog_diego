@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

        <section class="banner" style="margin-bottom: 300px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner__content ">
                                 <h2 class="mb-4">Crear nueva publicación</h2>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Título</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="summary" class="form-label">Resumen</label>
                                        <textarea name="summary" class="form-control">{{ old('summary') }}</textarea>
                                    </div>

                                   <div class="mb-3">
                                        <label for="content" class="form-label">Contenido</label>
                                        <textarea name="content" id="editor" class="form-control" rows="8" required>{{ old('content') }}</textarea>
                                    </div>


                                  <div class="mb-3">
                                    <label class="form-label">Categorías</label>
                                    <div class="flex-wrap gap-2 d-flex">
                                        @foreach ($categories as $category)
                                            <input type="checkbox" class="btn-check" id="category_{{ $category->id }}" name="categories[]"
                                                value="{{ $category->id }}"
                                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary" for="category_{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label">Etiquetas</label>
                                    <div class="flex-wrap gap-2 d-flex">
                                        @foreach ($tags as $tag)
                                            <input type="checkbox" class="btn-check" id="tag_{{ $tag->id }}" name="tags[]"
                                                value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                            <label class="btn btn-outline-secondary" for="tag_{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>



                                    <div class="mb-3">
                                        <label for="featured_image" class="form-label">Imagen destacada</label>
                                        <input type="file" name="featured_image" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Estado</label>
                                        <select name="status" class="form-control" required>
                                            <option value="draft">Borrador</option>
                                            <option value="published">Publicado</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar publicación</button>
                                    <a href="{{ route('posts.list') }}" class="btn btn-secondary">Cancelar</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.newletter')


        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload') }}",
                filebrowserUploadMethod: 'form'
            });
        </script>

@endsection
