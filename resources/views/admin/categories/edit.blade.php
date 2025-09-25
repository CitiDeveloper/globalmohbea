@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="h4 mb-4">{{ isset($category) ? 'Edit' : 'Create' }} Category</h1>

    <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST">
        @csrf
        @if(isset($category)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">{{ isset($category) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
