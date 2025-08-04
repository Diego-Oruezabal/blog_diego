@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')


        <!--Banner-->
        <section class="banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">

                        @if(request('search'))
                            <div class="alert alert-info">
                                Se encontraron <strong>{{ $allPosts->total() }}</strong> resultados para: <strong>"{{ request('search') }}"</strong>
                            </div>
                        @elseif(request('category'))
                            <div class="alert alert-info">
                                Se encontraron <strong>{{ $allPosts->total() }}</strong> resultados en la categoría: <strong>"{{ ucfirst(request('category')) }}"</strong>
                            </div>
                        @elseif(request('tag'))
                            <div class="alert alert-info">
                                Se encontraron <strong>{{ $allPosts->total() }}</strong> resultados con la etiqueta: <strong>"{{ ucfirst(request('tag')) }}"</strong>
                            </div>

                        @elseif(request('author'))
                            @php
                                $authorName = \App\Models\User::find(request('author'))?->name ?? 'Autor desconocido';
                            @endphp
                            <div class="alert alert-info">
                                Se encontraron <strong>{{ $allPosts->total() }}</strong> resultados del autor: <strong>"{{ $authorName }}"</strong>
                            </div>
                        @endif





                        <div class="banner__content ">
                            <small class="banner__meta">
                                <a href="/" class="banner__link">Inicio</a>
                                <i class="bi bi-caret-right-fill banner__icon"></i>Posts
                            </small>
                            <h3 class="banner__title">Últimos  <span class="banner__category-color"> Posts</span></h3>
                            <p class="banner__subtitle"> Aquí se muestran las ultimas publicaciones del blog, puedes navegar por categorías, etiquetas o buscar contenido específico utilizando el formulario de búsqueda.</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--post-default-->
        <section class="mt-30 mb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 mt-30 side-content">

                       <div class="theiaStickySidebar">
                            <div class="row masonry-items">
                                @foreach($allPosts as $post)
                                    <div class="col-lg-6 col-md-6 masonry-item">
                                        <div class="post-card post-card--default">
                                            <div class="post-card__image">
                                                <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                                </a>
                                            </div>

                                            <div class="post-card__content">
                                                @if($post->categories->count())
                                                    @foreach($post->categories as $category)
                                                        <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="category">{{ $category->name }}</a>
                                                    @endforeach
                                                @endif

                                                <h5 class="post-card__title">
                                                    <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}" class="post-card__title-link">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>

                                                <p class="post-card__exerpt">
                                                    {{ Str::limit($post->summary, 120) }}
                                                </p>

                                                <ul class="post-card__meta list-inline">
                                                    <li class="post-card__meta-item">
                                                        <a href="{{ route('blog.index', ['author' => $post->user->id]) }}" class="post-card__meta-link">
                                                            <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('assets/img/author/default.png') }}" alt="{{ $post->user->name }}" class="post-card__meta-img">
                                                        </a>
                                                    </li>
                                                    <li class="post-card__meta-item">
                                                        <a href="{{ route('blog.index', ['author' => $post->user->id]) }}" class="post-card__meta-link">{{ $post->user->name }}</a>
                                                    </li>
                                                    <li class="post-card__meta-item">
                                                        <span class="dot"></span> {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        <!--pagination-->
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="pagination-wrapper">
                                        {{ $allPosts->links('vendor.pagination.bootstrap-4') }}

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-xl-3 max-width side-sidebar">
                        <div class="theiaStickySidebar">


                            <!--widget-Latest-Posts-->
                            <div class="widget">
                                <h5 class="widget__title">Latest Posts</h5>
                                <ul class="widget__latest-posts">
                            @foreach($latestPosts as $index => $latest)
                                <li class="widget__latest-posts__item">
                                    <div class="widget__latest-posts-image">
                                        <a href="{{ url($latest->id . '/' . $latest->slug) }}" class="widget__latest-posts-link">
                                            <img src="{{ asset('storage/' . $latest->featured_image) }}" alt="{{ $latest->title }}" class="widget__latest-posts-img">
                                        </a>
                                    </div>
                                    <div class="widget__latest-posts-count">{{ $index + 1 }}</div>
                                    <div class="widget__latest-posts__content">
                                        <p class="widget__latest-posts-title">
                                            <a href="{{ url($latest->id . '/' . $latest->slug) }}" class="widget__latest-posts-link">
                                                {{ Str::limit($latest->title, 60) }}
                                            </a>
                                        </p>
                                        <small class="widget__latest-posts-date">
                                            <i class="bi bi-clock-fill widget__latest-posts-icon"></i>
                                            {{ \Carbon\Carbon::parse($latest->published_at)->format('M d, Y') }}
                                        </small>
                             </div>
            </li>
        @endforeach
    </ul>
                            </div>


                            <!--widget-categories-->
                            <div class="widget">
                                <h5 class="widget__title">Categories</h5>
                                <ul class="widget__categories">
                                    @foreach($allCategories as $category)
                                        <li class="widget__categories-item">
                                            <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="category widget__categories-link">
                                                {{ $category->name }}
                                            </a>
                                            <span class="ml-auto widget__categories-number">
                                                {{ $category->posts_count }} Posts
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                            <!--widget-tags-->
                            <div class="widget">
                                <h5 class="widget__title">Tags</h5>
                                <ul class="list-inline widget__tags">
                                    @foreach($tags as $tag)
                                        <li class="widget__tags-item">
                                            <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="widget__tags-link">{{ $tag->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                            <!--widget-ads-->
                            <div class="widget">
                                                <h5  class="widget__title">ads</h5>
                                                <div class="widget__ads">
                                                    <a href="#" class="widget__ads-link">
                                                        <img src="{{ asset('assets/img/ads/einstein_mazinger.jpg') }}" alt="" class="widget__ads-img">

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </section><!--/-->

        <!--newslettre-->
        @include('partials.newletter')


@endsection

