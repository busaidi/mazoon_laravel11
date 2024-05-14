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
                        <h4 class="mb-3">{{ __('messages.edit_post') }}</h4>
                        <form method="post" action="{{ route('post.update', $post->id) }}" class="p-3 bg-light rounded">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title_en" class="form-label">{{ __('messages.post_title_en') }}:</label>
                                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ $post->getTranslation('title', 'en') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="title_ar" class="form-label">{{ __('messages.post_title_ar') }}:</label>
                                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ $post->getTranslation('title', 'ar') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">{{ __('messages.post_slug') }}:</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ $post->slug }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="body_en" class="form-label">{{ __('messages.post_body_en') }}:</label>
                                <div id="editor_en" style="height: 300px;"></div>
                                <textarea name="body_en" id="body_en" style="display:none;"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="body_ar" class="form-label">{{ __('messages.post_body_ar') }}:</label>
                                <div id="editor_ar" style="height: 300px;"></div>
                                <textarea name="body_ar" id="body_ar" style="display:none;"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('messages.post_status') }}:</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>{{ __('messages.published') }}</option>
                                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>{{ __('messages.draft') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">{{ __('messages.post_type') }}:</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="post" {{ $post->type == 'post' ? 'selected' : '' }}>{{ __('messages.post') }}</option>
                                    <option value="page" {{ $post->type == 'page' ? 'selected' : '' }}>{{ __('messages.page') }}</option>
                                    <option value="featured" {{ $post->type == 'featured' ? 'selected' : '' }}>{{ __('messages.featured') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">{{ __('messages.tags') }}:</label>
                                <select id="tags" name="tags[]" class="form-control" multiple>
                                    @foreach(\App\Models\Tag::all() as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">{{ __('messages.hold_ctrl_select') }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="new_tag" class="form-label">{{ __('messages.add_new_tags') }}:</label>
                                <input type="text" id="new_tag" name="new_tag" class="form-control" placeholder="{{ __('messages.tags_placeholder') }}">
                            </div>
                            <div class="mb-3">
                                <label for="author_id" class="form-label">{{ __('messages.author_id_optional') }}:</label>
                                <input type="number" id="author_id" name="author_id" class="form-control" value="{{ $post->author_id }}" placeholder="{{ __('messages.enter_author_id') }}">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark">{{ __('messages.update_post') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Sidebar widgets -->
                    @include('blog.sidebar')
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
