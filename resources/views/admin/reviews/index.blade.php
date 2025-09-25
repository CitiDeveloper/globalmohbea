@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Customer Reviews</h6>
            <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New Review
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{ $review->title }}</td>
                            <td>{{ $review->author_name }}</td>
                            <td>{{ $review->author_title }}</td>
                            <td><span class="text-warning">{{ $review->star_rating }}</span></td>
                            <td>
                                <span class="badge badge-{{ $review->is_published ? 'success' : 'warning' }}">
                                    {{ $review->is_published ? 'Published' : 'Draft' }}
                                </span>
                                @if($review->is_featured)
                                <span class="badge badge-primary ml-1">Featured</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reviews.toggle-featured', $review->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-{{ $review->is_featured ? 'secondary' : 'primary' }}">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reviews.toggle-published', $review->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-{{ $review->is_published ? 'warning' : 'success' }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $reviews->links() }}
        </div>
    </div>
</div>
@endsection