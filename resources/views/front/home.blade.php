@extends('layouts.front')

@section('content')
        <!-- # site-content
        ================================================== -->
        <section id="content" class="s-content">


            <!-- hero -->
            <div class="hero">

                <div class="hero__slider swiper-container">

                    <div class="swiper-wrapper">
                        @foreach ($featured_posts as $post)
                        <article class="hero__slide swiper-slide">
                            <div class="hero__entry-image" style="background-image: url('{{ $post->image_url }}');"></div>
                            <div class="hero__entry-text">
                                <div class="hero__entry-text-inner">
                                    <div class="hero__entry-meta">
                                        <span class="cat-links">
                                            <a href="category.html">{{ $post->category->name }}</a>
                                        </span>
                                    </div>
                                    <h2 class="hero__entry-title">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                    <p class="hero__entry-desc">
                                    {!! Str::words($post->content, 30) !!}
                                    </p>
                                    <a class="hero__more-link" href="{{ route('posts.show', $post->slug) }}">Read More</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div> <!-- swiper-wrapper -->

                    <div class="swiper-pagination"></div>
    
                </div> <!-- end hero slider -->

                <a href="#bricks" class="hero__scroll-down smoothscroll">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
                    </svg>
                    <span>Scroll</span>
                </a>

            </div> <!-- end hero -->


            <!--  masonry -->
            <div id="bricks" class="bricks">

                <div class="masonry">

                    <div class="bricks-wrapper" data-animate-block>

                        <div class="grid-sizer"></div>

                        @foreach ($posts as $post)
                        <article class="brick entry" data-animate-el>
        
                            <div class="entry__thumb">
                                <a href="single-standard.html" class="thumb-link">
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                                </a>
                            </div> <!-- end entry__thumb -->
        
                            <div class="entry__text">
                                <div class="entry__header">
                                    <div class="entry__meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $post->category->name }}</a>
                                        </span>
                                        <span class="byline">
                                            By:
                                            <a href="#0">Naruto Uzumaki</a>
                                        </span>
                                    </div>
                                    <h1 class="entry__title"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h1>
                                 </div>
                                <div class="entry__excerpt">
                                    <p>
                                        {!! Str::words($post->content, 30) !!}
                                    </p>
                                </div>
                                <a class="entry__more-link" href="{{ route('posts.show', $post->slug) }}">Read More</a>
                            </div> <!-- end entry__text -->
                        
                        </article> <!-- end article -->
                        @endforeach

                    </div> <!-- end bricks-wrapper -->

                </div> <!-- end masonry-->

                {{ $posts->links('layouts.pagination.front') }}


            </div> <!-- end bricks -->

        </section> <!-- end s-content -->

@endsection
        