@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Manage Ride - {{ $ride->date->format('l, F jS Y') }}</h4>
                        @if($ride->status == 'in_progress')
                            <span class="badge bg-warning">
                                <i class="fas fa-bus"></i> Ride in Progress
                            </span>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Route Information</h5>
                            <p><strong>Route:</strong> {{ $ride->route->name }}</p>
                            <p><strong>Driver:</strong> {{ $ride->driver->name }}</p>
                            <p><strong>Capacity:</strong> 
                                {{ $ride->bookings()->where('status', 'confirmed')->count() }} / {{ $ride->route->capacity }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            @if($ride->status == 'scheduled' && $ride->date == now()->format('Y-m-d'))
                                <form action="{{ route('rides.start', $ride) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg w-100">
                                        <i class="fas fa-play"></i> Start Ride
                                    </button>
                                </form>
                            @elseif($ride->status == 'in_progress')
                                <form action="{{ route('rides.complete', $ride) }}" method="POST" class="mb-3">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg w-100">
                                        <i class="fas fa-stop"></i> Complete Ride
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Pickup Points</h5>
                        <div class="list-group">
                            @foreach($ride->route->pickupPoints as $point)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $point->name }}</h6>
                                            @if($point->description)
                                                <small class="text-muted">{{ $point->description }}</small>
                                            @endif
                                            
                                            @php
                                                $bookings = $ride->bookings()
                                                    ->where('pickup_point_id', $point->id)
                                                    ->where('status', 'confirmed')
                                                    ->with(['user', 'guestRiders'])
                                                    ->get();
                                            @endphp
                                            
                                            <div class="mt-2">
                                                <span class="badge bg-info">
                                                    {{ $bookings->count() }} riders
                                                </span>
                                                @if($bookings->flatMap->guestRiders->count() > 0)
                                                    <span class="badge bg-secondary">
                                                        +{{ $bookings->flatMap->guestRiders->count() }} guests
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        @if($ride->status == 'in_progress')
                                            <div>
                                                @if($ride->currentLocation && $ride->currentLocation->pickup_point_id == $point->id)
                                                    <span class="badge bg-warning">Current Location</span>
                                                @elseif($ride->currentLocation && $ride->currentLocation->pickupPoint->order > $point->order)
                                                    <form action="{{ route('rides.depart', ['ride' => $ride, 'pickupPoint' => $point]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check"></i> Confirm Departure
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="badge bg-secondary">Upcoming</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    
                                    @if($bookings->isNotEmpty() && $ride->status == 'in_progress')
                                        <div class="mt-3">
                                            <h6 class="mb-2">Riders to Check-in:</h6>
                                            <div class="row">
                                                @foreach($bookings as $booking)
                                                    <div class="col-md-6 mb-2">
                                                        <div class="card">
                                                            <div class="card-body p-2">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <strong>{{ $booking->user->name }}</strong>
                                                                        @if($booking->checked_in_at)
                                                                            <span class="badge bg-success ms-2">Checked In</span>
                                                                        @endif
                                                                    </div>
                                                                    @if(!$booking->checked_in_at)
                                                                        <form action="{{ route('bookings.check-in', $booking) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                                <i class="fas fa-check"></i> Check In
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                                
                                                                @if($booking->guestRiders->isNotEmpty())
                                                                    <div class="mt-2">
                                                                        <small class="text-muted">Guests:</small>
                                                                        <ul class="list-unstyled mb-0">
                                                                            @foreach($booking->guestRiders as $guest)
                                                                                <li>
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <span>{{ $guest->name }} ({{ $guest->phone }})</span>
                                                                                        @if($guest->checked_in_at)
                                                                                            <span class="badge bg-success">Checked In</span>
                                                                                        @else
                                                                                            <form action="{{ route('guests.check-in', $guest) }}" method="POST">
                                                                                                @csrf
                                                                                                <button type="submit" class="btn btn-xs btn-outline-primary">
                                                                                                    <i class="fas fa-check"></i> Check In
                                                                                                </button>
                                                                                            </form>
                                                                                        @endif
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection