<!doctype html>
<html lang="es">

<head>
@include('partials.head')
</head>

<body>
   @include('partials.loading')

    <!-- Header -->
    @include('partials.header')
    <!--/-->

    <main class="main">
        <!--slider-two-->
       <div class="slider slider--two">
        <div class="swiper slider__top">
            <div class="swiper-wrapper">
                @foreach ($latestPost as $post)
                    <div class="slider__item swiper-slide" style="background-image: url('{{ asset('storage/' . $post->featured_image) }}');">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9 col-md-12">
                                    <div class="slider__item-content">

                                        <!-- Mostrar todas las categorías -->
                                        <div class="category">
                                            @foreach ($post->categories as $category)
                                                <a href="#" class="category">{{ $category->name }}</a>
                                            @endforeach
                                        </div>

                                        <h1 class="slider__title">
                                            <a href="#" class="slider__title-link">{{ $post->title }}</a>
                                        </h1>
                                        <p class="slider__exerpt">{{ Str::limit($post->excerpt, 120) }}</p>
                                        <ul class="slider__meta list-inline">
                                            <li class="slider__meta-item">
                                                <a href="#" class="slider__meta-link">
                                                    <img src="{{ asset('storage/' . ($post->author->profile_image ?? 'default.jpg')) }}" alt="" class="slider__meta-img">
                                                </a>
                                            </li>
                                            <li class="slider__meta-item">
                                                <a href="#" class="slider__meta-link">{{ $post->user->name ?? 'Autor desconocido' }}</a>
                                            </li>
                                            <li class="slider__meta-item">
                                                <span class="dot"></span> {{ $post->created_at->format('F d, Y') }}
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div thumbsSlider="" class="swiper slider__bottom container-fluid">
            <div class="swiper-wrapper">
                @foreach ($latestPost as $post)
                    <div class="swiper-slide">
                        <div class="post-slider">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="post-slider__img">
                            <div class="post-slider__content">
                                <p class="post-slider__title">
                                    <span>{{ $post->title }}</span>
                                </p>
                                <ul class="post-slider__meta list-inline">
                                    <li class="post-slider__meta-link">
                                        <i class="bi bi-clock-fill"></i> {{ $post->created_at->format('F d, Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



        <!--blog-Home-2-->
        <section class="mt-90">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($allPosts as $post)
                        <div class="mb-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="post-card post-card--default">
                                <div class="post-card__image">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                    </a>
                                </div>

                                <div class="post-card__content">
                                    {{-- Mostrar la primera categoría --}}
                                    @if ($post->categories->count())
                                        <a href="#" class="category">{{ $post->categories->first()->name }}</a>
                                    @endif

                                    <h5 class="post-card__title">
                                        <a href="#" class="post-card__title-link">{{ $post->title }}</a>
                                    </h5>

                                    <p class="post-card__exerpt">
                                        {{ Str::limit($post->excerpt, 120) }}
                                    </p>

                                    <ul class="post-card__meta list-inline">
                                        <li class="post-card__meta-item">
                                            <a href="#" class="post-card__meta-link">
                                                <img src="{{ asset('storage/' . ($post->author->profile_image ?? 'default.jpg')) }}" alt="" class="post-card__meta-img">
                                            </a>
                                        </li>
                                        <li class="post-card__meta-item">
                                            <a href="#" class="post-card__meta-link">{{ $post->user->name ?? 'Autor desconocido' }}</a>
                                        </li>
                                        <li class="post-card__meta-item">
                                            <span class="dot"></span> {{ $post->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- PAGINACIÓN DINÁMICA --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-wrapper">
                            {{ $allPosts->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--newslettre-->
       @include('partials.newletter')
    </main>

    <!--footer-->
    @include('partials.footer' )

    <!--Search-form-->
    <div class="search__box">
        <div class="container-fluid">
            <div class="row">
                <div class="m-auto col-lg-6 col-md-8 col-sm-11">
                    <div class="search__content ">
                        <button type="button" class="search__box-btn-close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <form class="search__form" action="search-page.html">
                            <input type="search" class="search__form-input" value="" placeholder="What are you looking for?">
                            <button type="submit" class="search__form-btn-search">search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('partials.js')

</body>

</html>
