@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  ">
                    <h4>Manage Post: {{ $post->title }}</h4>
                    <span class="badge badge-{{ $post->is_published ? 'success' : 'warning' }}">
                        {{ $post->is_published ? 'Published' : 'Draft' }}
                    </span>
                    <br>
                    <br>
                </div>
                <div class="card-body">
                    @if($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" class="img-fluid mb-4 rounded">
                    @endif
                    
                    <div class="post-content mb-4">
                        {!! $post->content !!}
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="text-muted">Created: {{ $post->created_at->format('M d, Y') }}</span>
                            @if($post->created_at != $post->updated_at)
                                <span class="text-muted ml-3">Updated: {{ $post->updated_at->format('M d, Y') }}</span>
                            @endif
                        </div>
                        <div>
                            <span class="badge badge-info">{{ ucfirst($post->type) }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.posts.toggle-publish', $post->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-{{ $post->is_published ? 'secondary' : 'success' }}">
                                <i class="fas fa-{{ $post->is_published ? 'eye-slash' : 'eye' }}"></i>
                                {{ $post->is_published ? 'Unpublish' : 'Publish' }}
                            </button>
                        </form>
                        
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-info ml-2">
                            <i class="fas fa-list"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header  ">
                    <h5>Post Statistics</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Views
                            <span class="badge badge-primary badge-pill">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Comments
                            <span class="badge badge-primary badge-pill">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Shares
                            <span class="badge badge-primary badge-pill">0</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection