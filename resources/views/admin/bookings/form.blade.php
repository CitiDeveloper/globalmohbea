<form method="POST" action="{{ isset($booking) ? route('admin.bookings.update', $booking->id) : route('admin.bookings.store') }}">
    @csrf
    @if(isset($booking)) @method('PUT') @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tour_id">Tour*</label>
                <select class="form-control @error('tour_id') is-invalid @enderror" id="tour_id" name="tour_id" required>
                    <option value="">Select Tour</option>
                    @foreach($tours as $tour)
                    <option value="{{ $tour->id }}" {{ old('tour_id', $booking->tour_id ?? '') == $tour->id ? 'selected' : '' }}>
                        {{ $tour->title }}
                    </option>
                    @endforeach
                </select>
                @error('tour_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status*</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="pending" {{ old('status', $booking->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $booking->status ?? '') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ old('status', $booking->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ old('status', $booking->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Full Name*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  
                       value="{{ old('name', $booking->name ?? '') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                       value="{{ old('email', $booking->email ?? '') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="phone">Phone*</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" 
                       value="{{ old('phone', $booking->phone ?? '') }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tour_date">Tour Date*</label>
                <input type="date" class="form-control @error('tour_date') is-invalid @enderror" id="tour_date" name="tour_date" 
                       value="{{ old('tour_date', isset($booking) ? $booking->tour_date->format('Y-m-d') : '') }}" required>
                @error('tour_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="number_of_travellers">Number of Travelers*</label>
                <input type="number" min="1" class="form-control @error('number_of_travellers') is-invalid @enderror" 
                       id="number_of_travellers" name="number_of_travellers" 
                       value="{{ old('number_of_travellers', $booking->number_of_travellers ?? '') }}" required>
                @error('number_of_travellers')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="special_requests">Special Requests</label>
        <textarea class="form-control @error('special_requests') is-invalid @enderror" id="special_requests" 
                  name="special_requests" rows="3">{{ old('special_requests', $booking->special_requests ?? '') }}</textarea>
        @error('special_requests')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($booking) ? 'Update' : 'Create' }} Booking
    </button>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
</form>