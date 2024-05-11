@extends('layouts.app')

@section('content')
    <div class="container">
        <main class="container">
            <div class="row g-5">
                <div class="col-md-8">
                    <div class="p-4 mb-4 rounded bg-body-secondary text-body-emphasis">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4 class="mb-3">Edit Post</h4>
                        <form method="post" action="{{ route('post.update', $post->id) }}" class="p-3 bg-light rounded">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Post Title (English):</label>
                                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ $post->getTranslation('title', 'en') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="title_ar" class="form-label">Post Title (Arabic):</label>
                                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ $post->getTranslation('title', 'ar') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Post Slug:</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ $post->slug }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="body_en" class="form-label">Post Body (English):</label>
                                <div id="editor_en" style="height: 300px;"></div>
                                <textarea name="body_en" id="body_en" style="display:none;">{{ $post->getTranslation('body', 'en') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="body_ar" class="form-label">Post Body (Arabic):</label>
                                <div id="editor_ar" style="height: 300px;"></div>
                                <textarea name="body_ar" id="body_ar" style="display:none;">{{ $post->getTranslation('body', 'ar') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Post Status:</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Post Type:</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="post" {{ $post->type == 'post' ? 'selected' : '' }}>Post</option>
                                    <option value="page" {{ $post->type == 'page' ? 'selected' : '' }}>Page</option>
                                    <option value="featured" {{ $post->type == 'featured' ? 'selected' : '' }}>Featured</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="author_id" class="form-label">Author ID (optional):</label>
                                <input type="number" id="author_id" name="author_id" class="form-control" value="{{ $post->author_id }}" placeholder="Enter author ID if applicable">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Sidebar widgets -->
                    @include('blog.sidebar')
                </div>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quillEn = new Quill('#editor_en', {
                theme: 'snow'
            });
            quillEn.root.innerHTML = document.querySelector('textarea[name=body_en]').value;

            const quillAr = new Quill('#editor_ar', {
                theme: 'snow'
            });
            quillAr.root.innerHTML = document.querySelector('textarea[name=body_ar]').value;

            var form = document.querySelector('form');
            form.onsubmit = function() {
                // Populate hidden forms on submit
                var bodyEn = document.querySelector('textarea[name=body_en]');
                bodyEn.value = quillEn.root.innerHTML;

                var bodyAr = document.querySelector('textarea[name=body_ar]');
                bodyAr.value = quillAr.root.innerHTML;
            };
        });
    </script>
@endpush
