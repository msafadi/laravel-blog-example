@extends('layouts.front')

@section('content')

<!-- # site-content
        ================================================== -->
        <div id="content" class="s-content s-content--blog">

                <div class="row entry-wrap">
                    <div class="column lg-12">

                        <article class="entry format-standard">

                            <header class="entry__header">
    
                                <h1 class="entry__title">
                                    {{ $post->title }}
                                </h1>

                                <div class="entry__meta">
                                    <div class="entry__meta-author">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <circle cx="12" cy="8" r="3.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.8475 19.25H17.1525C18.2944 19.25 19.174 18.2681 18.6408 17.2584C17.8563 15.7731 16.068 14 12 14C7.93201 14 6.14367 15.7731 5.35924 17.2584C4.82597 18.2681 5.70558 19.25 6.8475 19.25Z"></path>
                                        </svg>
                                        <a href="#">{{ $post->user->name }}</a> 
                                    </div>
                                    <div class="entry__meta-date">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                                        </svg>
                                        {{ $post->published_at }} 
                                    </div>
                                    <div class="entry__meta-cat">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 17.25V9.75C19.25 8.64543 18.3546 7.75 17.25 7.75H4.75V17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H17.25C18.3546 19.25 19.25 18.3546 19.25 17.25Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 7.5L12.5685 5.7923C12.2181 5.14977 11.5446 4.75 10.8127 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V11"></path>
                                        </svg>
                                          
                                        <span class="cat-links">
                                            <a href="#0">{{ $post->category->name }}</a>
                                        </span>
                                    </div>
                                </div>
                            </header>

                            <div class="entry__media">
                                <figure class="featured-image">
                                    <img src="{{ $post->image_url }}" alt="">
                                </figure>
                            </div>

                            <div class="content-primary">

                                <div class="entry__content">
                                    {!! $post->content !!}

                                    <p class="entry__tags">
                                        <strong>Tags:</strong>
                    
                                        <span class="entry__tag-list">
                                            <a href="#0">orci</a>
                                            <a href="#0">lectus</a>
                                            <a href="#0">varius</a>
                                            <a href="#0">turpis</a>
                                        </span>
                        
                                    </p>
    
                                    <div class="entry__author-box">
                                        <figure class="entry__author-avatar">
                                            <img alt="" src="{{ asset('images/avatars/user-06.jpg') }}" class="avatar">
                                        </figure>
                                        <div class="entry__author-info">
                                            <h5 class="entry__author-name">
                                                <a href="#0">
                                                    {{ $post->user->name }}
                                                </a>
                                            </h5>
                                            <p>
                                            Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, 
                                            a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam 
                                            consequat occaecat.
                                            </p>
                                        </div>
                                    </div>

                                </div> <!-- end entry-content -->

                                <div class="post-nav">
                                    @if($prevPost)
                                    <div class="post-nav__prev">
                                        <a href="{{ route('posts.show', $prevPost->slug) }}" rel="prev">
                                            <span>Prev</span>
                                            {{ $prevPost->title }}. 
                                        </a>
                                    </div>
                                    @endif
                                    @if($nextPost)
                                    <div class="post-nav__next">
                                        <a href="{{ route('posts.show', $nextPost->slug) }}" rel="next">
                                            <span>Next</span>
                                            {{ $nextPost->title }}.
                                        </a>
                                    </div>
                                    @endif
                                </div>

                            </div> <!-- end content-primary -->

                        </article> <!-- end entry -->

                        <!-- comments -->
                        <div class="comments-wrap">

                            <div id="comments">
                                <div class="large-12">

                                    <h3>{{ trans_choice(':count Comments', $comments->count(), ['count' => $comments->count()]) }}</h3>

                                    <!-- START commentlist -->
                                    <ol class="commentlist">
                                        @foreach($comments as $comment)
                                        <li class="depth-1 comment">
                                            <div class="comment__avatar">
                                                <img class="avatar" src="{{ asset('images/avatars/user-01.jpg') }}" alt="" width="50" height="50">
                                            </div>
                                            <div class="comment__content">
                                                <div class="comment__info">
                                                    <div class="comment__author">{{ $comment->name }}</div>

                                                    <div class="comment__meta">
                                                        <div class="comment__time">{{ $comment->created_at }}</div>
                                                        <div class="comment__reply">
                                                            <a class="comment-reply-link" href="#0">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment__text">
                                                    <p>{{ $comment->body }}</p>
                                                </div>
                                            </div>
                                        </li> <!-- end comment level 1 -->
                                        @endforeach
                                    </ol>
                                    <!-- END commentlist -->

                                </div> <!-- end col-full -->
                            </div> <!-- end comments -->


                            <div class="comment-respond">

                                @if (session()->has('success'))
                                <p class="alert alert-success">{{ session('success') }}</p>
                                @endif

                                <!-- START respond -->
                                <div id="respond">

                                    <h3>
                                    {{ __('Add Comment') }} 
                                    <span>{{ __('Your email address will not be published.') }}</span>
                                    </h3>

                                    <form name="contactForm" id="contactForm" method="post" action="{{ route('comments.store') }}" autocomplete="off">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <fieldset class="row">

                                            <div class="column lg-6 tab-12 form-field">
                                                <input name="name" id="cName" class="u-fullwidth h-remove-bottom" placeholder="Your Name" value="" type="text">
                                            </div>

                                            <div class="column lg-6 tab-12 form-field">
                                                <input name="email" id="cEmail" class="u-fullwidth h-remove-bottom" placeholder="Your Email" value="" type="text">
                                            </div>

                                            <div class="column lg-12 form-field">
                                                <input name="website" id="cWebsite" class="u-fullwidth h-remove-bottom" placeholder="Website" value="" type="text">
                                            </div>

                                            <div class="column lg-12 message form-field">
                                                <textarea name="body" id="cMessage" class="u-fullwidth" placeholder="Your Message"></textarea>
                                            </div>

                                            <div class="column lg-12">
                                                <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large u-fullwidth" value="{{ __('Add Comment') }}" type="submit">
                                            </div>

                                        </fieldset>
                                    </form> <!-- end form -->

                                </div>
                                <!-- END respond-->

                            </div> <!-- end comment-respond -->

                        </div> <!-- end comments-wrap -->

                    </div>
                </div> <!-- end entry-wrap -->
        </section> <!-- end s-content -->

@endsection