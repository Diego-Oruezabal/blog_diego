@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

        <!--post-default-->
        <section class="mt-130 mb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 side-content">
                        <div class="theiaStickySidebar">
                            <!--Post-single-->
                            <div class="post-single">
                            <div class="post-single__image">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="post-single__image-img">
                            </div>

    <div class="post-single__content">
       @if($post->categories->count())
            @foreach($post->categories as $category)
                <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="category">{{ $category->name }}</a>
            @endforeach
        @endif

        <h2 class="post-single__title">{{ $post->title }}</h2>

        <ul class="post-single__meta list-inline">
            <li class="post-single__meta-item">
                <a href="{{ route('blog.index', ['author' => $post->user->id]) }}">
                    <img src="{{ asset('assets/img/author/diego.png') }}" alt="{{ $post->user->name }}" class="post-single__meta-img">
                </a>
            </li>
            <li class="post-single__meta-item">
                <a href="{{ route('blog.index', ['author' => $post->user->id]) }}" class="post-single__meta-link">{{ $post->user->name }}</a>
            </li>
            <li class="post-single__meta-item">
                <span class="dot"></span> {{ $post->published_at->format('F d, Y') }}
            </li>
        </ul>
    </div>

    <div class="post-single__body">
        {!! $post->content !!}
    </div>

    <div class="post-single__footer">
        @if ($post->tags->count())
            <ul class="list-inline widget__tags">
                @foreach ($post->tags as $tag)
                    <li class="widget__tags-item">
                        <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="widget__tags-link">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

                            <!--Related-posts-->
                            <div class="row">
                                {{-- Post anterior --}}
                                @if($previousPost)
                                    <div class="col-md-6">
                                        <div class="widget">
                                            <div class="widget__related-post">
                                                <div class="widget__related-post__image">
                                                    <a href="{{ url($previousPost->id . '/' . $previousPost->slug) }}">
                                                        <img src="{{ asset('storage/' . $previousPost->featured_image) }}" alt="{{ $previousPost->title }}" class="widget__related-post__img">
                                                    </a>
                                                </div>
                                                <div class="widget__related-post__content">
                                                    <a class="btn-link" href="{{ url($previousPost->id . '/' . $previousPost->slug) }}">
                                                        <i class="bi bi-arrow-left"></i> Previous post
                                                    </a>
                                                    <p class="widget__related-post__title">
                                                        <a href="{{ url($previousPost->id . '/' . $previousPost->slug) }}" class="widget__related-post__link">
                                                            {{ Str::limit($previousPost->title, 60) }}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- Post siguiente --}}
                                @if($nextPost)
                                    <div class="col-md-6">
                                        <div class="widget">
                                            <div class="widget__related-post">
                                                <div class="widget__related-post__image">
                                                    <a href="{{ url($nextPost->id . '/' . $nextPost->slug) }}">
                                                        <img src="{{ asset('storage/' . $nextPost->featured_image) }}" alt="{{ $nextPost->title }}" class="widget__related-post__img">
                                                    </a>
                                                </div>
                                                <div class="widget__related-post__content">
                                                    <a class="btn-link" href="{{ url($nextPost->id . '/' . $nextPost->slug) }}">
                                                        Next post <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                    <p class="widget__related-post__title">
                                                        <a href="{{ url($nextPost->id . '/' . $nextPost->slug) }}" class="widget__related-post__link">
                                                            {{ Str::limit($nextPost->title, 60) }}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>



                        </div>
                    </div>

                    <div class="col-xl-3 max-width side-sidebar">
                        <div class="theiaStickySidebar">
                            <!--widget-author-->
                            <div class="widget">
                                <div class="widget__author">
                                    <div class="widget__author-top">
                                        <a href="{{ route('blog.index', ['author' => $post->user->id]) }}" class="widget__author-link">
                                            <img src="{{ asset('assets/img/author/diego.png') }}" alt="{{ $post->user->name }}" class="widget__author-img">
                                        </a>
                                    </div>
                                    <div class="widget__author-content">
                                        <h6 class="widget__author-name">Hi, I'm {{ $post->user->name }}</h6>

                                        @if($post->user->descripcion)
                                            <p class="widget__author-bio">
                                                {{ $post->user->descripcion }}
                                            </p>
                                        @endif

                                        <ul class="list-inline social-media social-media--layout-two">
                                            @if($post->user->urlfacebook)
                                                <li class="social-media__item">
                                                    <a href="{{ $post->user->urlfacebook }}" class="social-media__link color-facebook" target="_blank">
                                                        <i class="bi bi-facebook"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            @if($post->user->urlinstagram)
                                                <li class="social-media__item">
                                                    <a href="{{ $post->user->urlinstagram }}" class="social-media__link color-instagram" target="_blank">
                                                        <i class="bi bi-instagram"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            @if($post->user->urlyoutube)
                                                <li class="social-media__item">
                                                    <a href="{{ $post->user->urlyoutube }}" class="social-media__link color-youtube" target="_blank">
                                                        <i class="bi bi-youtube"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>


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
                                    @foreach($post->tags as $tag)
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
                                                        <img src="{{ asset('assets/img/ads/ads3.jpg') }}" alt="" class="widget__ads-img">

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



