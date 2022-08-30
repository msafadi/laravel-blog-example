@extends('layouts.front')

@section('content')

<!-- # site-content
        ================================================== -->
        <section id="content" class="s-content">


            <!-- pageheader -->
            <div class="s-pageheader">
                <div class="row">
                    <div class="column large-12">
                        <h1 class="page-title">
                            <span class="page-title__small-type">Search:</span>
                            {{ $keyword }}
                        </h1>
                    </div>
                </div>
            </div> <!-- end s-pageheader-->

            <!--  masonry -->
            <div id="bricks" class="bricks">

                <div class="masonry">

                    <div class="bricks-wrapper" data-animate-block>

                        <div class="grid-sizer"></div>

                        @foreach($posts as $post)
                        <article class="brick entry" data-animate-el>
        
                            <div class="entry__thumb">
                                <a href="{{ $post->url }}" class="thumb-link">
                                    <img src="{{ $post->image_url }}" alt="">
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
                                            <a href="#0">{{ $post->user->name }}</a>
                                        </span>
                                    </div>
                                    <h1 class="entry__title"><a href="{{ $post->url }}">{{ $post->title }}</a></h1>
                                 </div>
                                <div class="entry__excerpt">
                                    <p>
                                    {{ $post->excerpt }}
                                    </p>
                                </div>
                                <a class="entry__more-link" href="{{ $post->url }}">Read More</a>
                            </div> <!-- end entry__text -->
                        
                        </article> <!-- end article -->
                        @endforeach

                    </div> <!-- end bricks-wrapper -->

                </div> <!-- end masonry-->


                <!-- pagination -->
                {{ $posts->links('layouts.pagination.front') }}
                <!-- end pagination -->

            </div> <!-- end bricks -->

        </section> <!-- end s-content -->

@endsection