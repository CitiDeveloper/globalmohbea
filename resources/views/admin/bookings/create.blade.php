@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($booking) ? 'Edit' : 'Create' }} Booking</h6>
           
        </div>
        <div class="card-body">
            @include('admin.bookings.form')
        </div>
    </div>
</div>
@endsection

