@extends('public_site.layouts.welcome')
@section('title', 'Room Details')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <img src="{{ asset('images/' , $room->image) }}" class="card-img-top" alt="Room Image" style="height: 350px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title text-primary">{{ $room->room_title }}</h2>
                    <p class="card-text">{{ $room->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Free Wifi:</strong> {{ $room->wifi }}</li>
                        <li class="list-group-item"><strong>Room Type:</strong> {{ $room->room_type }}</li>
                        <li class="list-group-item"><strong>Price:</strong> ${{ $room->price }} / night</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-lg border-0 p-4">
                <h3 class="text-center text-primary">Book This Room</h3>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ url('add_booking', $room->id) }}" method="post">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" 
                               @if(Auth::id()) value="{{ Auth::user()->name }}" @endif required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" 
                               @if(Auth::id()) value="{{ Auth::user()->email }}" @endif required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="startDate" id="startDate" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="endDate" id="endDate" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Additional Services</label>
                        <select name="services[]" class="form-select" multiple>
                            <option value="breakfast">Breakfast Included</option>
                            <option value="airport_transfer">Airport Transfer</option>
                            <option value="gym_access">Gym Access</option>
                            <option value="spa">Spa & Wellness</option>
                            <option value="sea_view">Sea View Room</option>
                        </select>
                        <small class="text-muted">Hold Ctrl (or Cmd on Mac) to select multiple options.</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Book Room</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split('T')[0];
        document.getElementById("startDate").setAttribute("min", today);
        document.getElementById("endDate").setAttribute("min", today);
    });
</script>
@endpush