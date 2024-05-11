@foreach($comments as $comment)
    <article class="mb-4 border-bottom pb-2" style="@if($comment->parent_id != null) margin-left:40px; @endif">
        <header class="mb-2 d-flex justify-content-between align-items-center">
            <strong>{{ $comment->user->name }}</strong>
            <small>{{ $comment->created_at->format('M d, Y') }}</small>
        </header>
        <p>{{ $comment->body }}</p>
        <footer class="d-flex align-items-center">
            <button class="btn btn-outline-dark btn-sm me-2" data-bs-toggle="collapse" data-bs-target="#replyForm-{{ $comment->id }}">Reply</button>
            <div class="collapse w-100" id="replyForm-{{ $comment->id }}">
                <form method="post" action="{{ route('comments.store') }}" class="mt-2">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="body" class="form-control" placeholder="Write a reply..." aria-label="Reply" aria-describedby="button-addon2">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <button class="btn btn-dark" type="submit" id="button-addon2">Post Reply</button>
                </form>
            </div>
        </footer>
    </article>
    @include('blog.post.commentsDisplay', ['comments' => $comment->replies])
@endforeach
