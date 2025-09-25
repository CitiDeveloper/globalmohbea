@extends('layouts.admin')

@section('content')
<div class="row mt-4">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4>Edit Post: {{ $post->title }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="editor" class="form-control" rows="10" required>{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="blog" {{ $post->type === 'blog' ? 'selected' : '' }}>Blog</option>
                                    <option value="review" {{ $post->type === 'review' ? 'selected' : '' }}>Review</option>
                                    <option value="guide" {{ $post->type === 'guide' ? 'selected' : '' }}>Guide</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_published" class="form-control">
                                    <option value="1" {{ $post->is_published ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ !$post->is_published ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Featured Image</label>
                                @if($post->featured_image)
                                    <img src="{{ asset($post->featured_image) }}" class="img-fluid mb-2" style="max-height: 150px;">
                                @endif
                                <input type="file" name="featured_image" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize CKEditor for edit form
    CKEDITOR.replace('editor', {
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'document', items: ['Source'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        height: 400
    });
</script>
@endsection