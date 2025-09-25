@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Tour Count Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ number_format($tourCount) }}</h2>
                            <p class="m-b-0 text-muted">Tours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Page Views Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$postsCount}}</h2>
                            <p class="m-b-0 text-muted">Posts Created</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Booking Count Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ number_format($bookingCount) }}</h2>
                            <p class="m-b-0 text-muted">Bookings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Customer Count Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ number_format($customerCount) }}</h2>
                            <p class="m-b-0 text-muted">Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Recent Bookings Table -->
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Top 10 Recent Bookings</h5>
                        <div>
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-default">View All</a>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tour</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th style="max-width: 70px">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBookings as $booking)
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                
                                                <div class="m-l-10">
                                                    <span>{{ $booking->tour->title }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $booking->name }}<br>
                                            <small>{{ $booking->email }}</small><br>
                                            <small>{{ $booking->phone }}</small>
                                        </td>
                                        <td>{{ $booking->tour_date->format('M d, Y') }}</td>
                                        <td>
                                            @php
                                                $statusClasses = [
                                                    'pending' => 'badge-warning',
                                                    'confirmed' => 'badge-success',
                                                    'completed' => 'badge-info',
                                                    'cancelled' => 'badge-danger'
                                                ];
                                            @endphp
                                            <span class="badge {{ $statusClasses[$booking->status] ?? 'badge-secondary' }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Booking Stats Card -->
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="m-b-0">Bookings</h5>
                    <div class="m-v-60 text-center" style="height: 200px">
                        <canvas class="chart" id="bookings-chart" 
                                data-pending="{{ $bookingStats['pending'] }}"
                                data-confirmed="{{ $bookingStats['confirmed'] }}"
                                data-completed="{{ $bookingStats['completed'] }}"
                                data-cancelled="{{ $bookingStats['cancelled'] }}">
                        </canvas>
                    </div>
                    <div class="row border-top p-t-25">
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-warning badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">{{ number_format($bookingStats['pending']) }}</h4>
                                        <p class="m-b-0 muted">Pending</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">{{ number_format($bookingStats['confirmed']) }}</h4>
                                        <p class="m-b-0 muted">Confirmed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-info badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">{{ number_format($bookingStats['completed']) }}</h4>
                                        <p class="m-b-0 muted">Completed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-danger badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">{{ number_format($bookingStats['cancelled']) }}</h4>
                                        <p class="m-b-0 muted">Cancelled</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Top Tours Table -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Top Tours</h5>
                        <div>
                            <a href="{{ route('admin.tours.index') }}" class="btn btn-sm btn-default">View All</a>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tour Title</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Bookings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topTours as $tour)
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                               
                                                <div class="m-l-10">
                                                    <span>{{ $tour->title }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($tour->description, 50) }}</td>
                                        <td>{{ $tour->duration }}</td>
                                        <td>${{ number_format($tour->price) }}</td>
                                        <td>{{ $tour->bookings_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the canvas element
    const ctx = document.getElementById('bookings-chart').getContext('2d');
    
    // Create the chart
    const bookingsChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Confirmed', 'Completed', 'Cancelled'],
            datasets: [{
                data: [
                    parseInt(document.getElementById('bookings-chart').dataset.pending),
                    parseInt(document.getElementById('bookings-chart').dataset.confirmed),
                    parseInt(document.getElementById('bookings-chart').dataset.completed),
                    parseInt(document.getElementById('bookings-chart').dataset.cancelled)
                ],
                backgroundColor: [
                    'rgba(250, 173, 20, 0.8)',  // Pending - yellow
                    'rgba(82, 196, 26, 0.8)',   // Confirmed - green
                    'rgba(24, 144, 255, 0.8)',  // Completed - blue
                    'rgba(245, 34, 45, 0.8)'    // Cancelled - red
                ],
                borderColor: [
                    'rgba(250, 173, 20, 1)',
                    'rgba(82, 196, 26, 1)',
                    'rgba(24, 144, 255, 1)',
                    'rgba(245, 34, 45, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.formattedValue;
                            return label;
                        }
                    }
                }
            }
        }
    });
});
</script>

@endsection

