@extends('layouts.app')
@section('content')

    <main class="container">
        @foreach($featuredPosts as $post)

            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <div class="col-lg-6 px-0">
                    <h1 class="display-4 fst-italic">{{ __($post->title) }}</h1>
                    <div>{!! preg_match('/<p[^>]*>(.*?)<\/p>/is', $post->body, $matches) ? $matches[0] : __($post->body) !!}</div>
                    <p class="lead mb-0"><a href="{{route('post.show',$post->id)}}" class="text-body-emphasis fw-bold">{{ __('messages.continue_reading') }}</a></p>
                </div>
            </div>
        @endforeach

        <div class="row mb-2">
            @foreach($pagePosts as $post)
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            @if($post->tags->isNotEmpty())  <!-- Check if there are tags -->
                            <strong class="d-inline-block mb-2 text-success-emphasis">{{ $post->tags->first()->name }}</strong>
                            @endif
                            <h3 class="mb-0">{{ __($post->title) }}</h3>
                            <div class="mb-1 text-body-secondary">{{ $post->created_at->format('jS M Y') }}</div>
                            {!! __($post->body) !!}
                            <a href="{{ route('post.show', $post->id) }}" class="icon-link gap-1 icon-link-hover stretched-link">
                                {{ __('messages.continue_reading') }}
                                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    {{ __('messages.from_the_firehose') }}
                </h3>

                @foreach($regularPosts as $post)
                    <article class="blog-post">
                        <h2 class="display-5 link-body-emphasis mb-1"><a  class="text-decoration-none text-dark" href="{{route('post.show',$post->id)}}">{{ __($post->title) }}</a> </h2>
                        <p class="blog-post-meta">{{ __('messages.created_at') }}: {{ $post->created_at->format('jS M Y') }} by <a href="#">{{ optional($post->user)->name }}</a> {{ __('messages.updated_at') }}: {{ $post->updated_at->format('jS M Y') }}</p>
                        {!! __($post->body) !!}
                    </article>
                @endforeach

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary rounded-pill" href="#">{{ __('messages.older') }}</a>
                    <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">{{ __('messages.newer') }}</a>
                </nav>

            </div>

            <div class="col-md-4">
                <!-- Sidebar widgets -->
                @include('blog.sidebar')
            </div>
        </div>

    </main>
    <br><br>

@endsection
