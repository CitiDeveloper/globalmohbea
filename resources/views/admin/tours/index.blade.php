@extends('layouts.admin')

@section('content')
    <div class="row">
        <h4 class="card-title text-center mb-4">Tours</h4>
         
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">All Tours</h5>
                    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary btn-sm">Add New Tour</a>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        @foreach ($tours as $tour)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">{{ $tour->title }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Category:</span>
                                        <span>{{ $tour->category->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Duration:</span>
                                        <span>{{ $tour->duration ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="text-muted">Featured:</span>
                                        <span>{{ $tour->is_featured ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <div class="text-center py-2 bg-light rounded">
                                        <h4 class="text-primary mb-0">${{ number_format($tour->price, 2) }}</h4>
                                        <small class="text-muted">per person</small>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <a href="{{ route('admin.tours.show', $tour) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    <a href="{{ route('admin.tours.edit', $tour) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this tour?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-4">
                        {{ $tours->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection