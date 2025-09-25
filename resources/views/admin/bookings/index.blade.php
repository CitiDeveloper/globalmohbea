@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tour Bookings</h6>
            <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Booking
            </a>
        </div>
        <div class="card-body">
            <form id="bulk-form" method="POST" action="{{ route('bookings.bulk-action') }}">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="40">
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th>ID</th>
                                <th>Tour</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Travelers</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td><input type="checkbox" name="selected_ids[]" value="{{ $booking->id }}"></td>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->tour->title }}</td>
                                <td>
                                    {{ $booking->name }}<br>
                                    <small>{{ $booking->email }}</small><br>
                                    <small>{{ $booking->phone }}</small>
                                </td>
                               <td>{{ $booking->tour_date->format('M d, Y') }}</td>

                                <td>{{ $booking->number_of_travellers }}</td>
                                <td>
                                    <span class="badge badge-{{ 
                                        $booking->status == 'confirmed' ? 'success' : 
                                        ($booking->status == 'cancelled' ? 'danger' : 
                                        ($booking->status == 'completed' ? 'info' : 'warning')) 
                                    }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-info" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                                            @csrf
                                          
                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-4">
                        <select name="action" class="form-control" required>
                            <option value="">-- With Selected --</option>
                            <option value="confirm">Confirm</option>
                            <option value="cancel">Cancel</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('admin.bookings.export') }}" class="btn btn-success">
                            <i class="fas fa-file-export"></i> Export
                        </a>
                    </div>
                </div>
            </form>
            
            {{ $bookings->links() }}
        </div>
    </div>
</div>
<script>
    // Select all checkboxes
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endsection

