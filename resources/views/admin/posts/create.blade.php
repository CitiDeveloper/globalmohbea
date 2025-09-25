@extends('layouts.admin')

@section('content')
<div class="row mt-4">
    <div class="col-md-7">  <!-- Changed to col-md-12 for wider editor -->
        <div class="card">
            <div class="card-header">
                <h4>Create New Post</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="editor" class="form-control" rows="10" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="blog">Blog</option>
                                    <option value="review">Review</option>
                                    <option value="guide">Guide</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Featured Image</label>
                                <input type="file" name="featured_image" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize CKEditor
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