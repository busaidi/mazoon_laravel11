@extends('layouts.app')

@section('content')
    <div class="container">
        <main class="container">
            <div class="row g-5">
                <div class="col-md-8">
                    <div class="p-4 mb-4 rounded bg-body-secondary text-body-emphasis">
                        <h4 class="mb-3">Create Post</h4>
                        <form method="post" action="{{ route('post.store') }}" class="p-3 bg-light rounded">
                            @csrf
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Post Title (English):</label>
                                <input type="text" id="title_en" name="title_en" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="title_ar" class="form-label">Post Title (Arabic):</label>
                                <input type="text" id="title_ar" name="title_ar" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Post Slug:</label>
                                <input type="text" id="slug" name="slug" class="form-control" required placeholder="Unique identifier for URL">
                            </div>
                            <div class="mb-3">
                                <label for="body_en" class="form-label">Post Body (English):</label>
                                <div id="editor_en" style="height: 300px;"></div>
                                <textarea name="body_en" id="body_en" style="display:none;"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="body_ar" class="form-label">Post Body (Arabic):</label>
                                <div id="editor_ar" style="height: 300px;"></div>
                                <textarea name="body_ar" id="body_ar" style="display:none;"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Post Status:</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="published" selected>Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Post Type:</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="post" selected>Post</option>
                                    <option value="page">Page</option>
                                    <option value="featured">Featured</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="author_id" class="form-label">Author ID (optional):</label>
                                <input type="number" id="author_id" name="author_id" class="form-control" placeholder="Enter author ID if applicable">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark">Create Post</button>
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
            const quillAr = new Quill('#editor_ar', {
                theme: 'snow'
            });

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
