@extends('layouts.app')

@section('content')
    <div class="container">
        <main class="container">
            @foreach($featuredPosts as $featuredPost)
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <div class="col-lg-6 px-0">
                        <h1 class="display-4 fst-italic">{{ __($featuredPost->title) }}</h1>
                        <div>{!! preg_match('/<p[^>]*>(.*?)<\/p>/is', $featuredPost->body, $matches) ? $matches[0] : __($featuredPost->body) !!}</div>
                        <p class="lead mb-0"><a href="{{route('post.show',$featuredPost->id)}}" class="text-body-emphasis fw-bold">{{ __('messages.continue_reading') }}</a></p>
                    </div>
                </div>
            @endforeach

            <div class="row g-5">
                <div class="col-md-8">
                    <h3 class="pb-4 mb-4 fst-italic border-bottom">
                        {{ __($post->title) }}
                    </h3>

                    <article class="blog-post">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-dark">{{ __('messages.edit') }}</a>
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}">{{ __('messages.delete') }}</button>
                            </div>
                        </div>
                        <p class="blog-post-meta">
                            {{ __('messages.created_on') }}: <span class="text-muted">{{ $post->created_at->format('jS M Y') }}</span> by
                            <a href="#" class="text-primary">{{ optional($post->user)->name }}</a> |
                            {{ __('messages.updated_on') }}: <span class="text-muted">{{ $post->updated_at->format('jS M Y') }}</span>
                        </p>

                        {!! __($post->body) !!}

                        <!-- Tags Section -->
                        <p>
                            {{ __('messages.tags') }}:
                            @foreach($post->tags as $tag)
                                <a href="#" class="badge bg-secondary">{{ $tag->name }}</a>
                            @endforeach
                        </p>

                        <!-- Modal for confirmation -->
                        <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1"
                             aria-labelledby="deleteModalLabel{{ $post->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $post->id }}">{{ __('messages.confirm_delete') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('messages.delete_confirmation') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                        <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark">{{ __('messages.delete') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section>
                            <h1 class="mb-4">{{ __('messages.comments') }}</h1>
                            <form method="post" action="{{ route('comments.store') }}" class="mb-4">
                                @csrf
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="body" placeholder="{{ __('messages.leave_comment') }}"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark">{{ __('messages.add_comment') }}</button>
                                </div>
                            </form>
                            @include('blog.post.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                        </section>
                    </article>
                </div>

                <div class="col-md-4">
                    <!-- Sidebar widgets -->
                    @include('blog.sidebar')
                </div>

            </div>
        </main>
    </div>
@endsection
