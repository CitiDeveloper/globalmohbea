@extends('layouts.admin')
@section('content')
<div class="container-fluid">
   <div class="card">
    <div class="card-body">
        <h1>Manage Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">New Post</a>
        <table class="table ">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ ucfirst($post->type) }}</td>
                    <td>{!! ucfirst(Str::words(strip_tags($post->content), 100, '...')) !!}</td>
                    <td>
                        
                        <a href="{{ route('admin.posts.manage', $post->id) }}" class="btn btn-sm btn-primary" title="Manage"> <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
   </div>
</div>
@endsection