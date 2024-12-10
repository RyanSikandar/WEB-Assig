@extends('layouts.app')

@section('content')
<div class="services">
    <h1>Our Services</h1>
    <div class="service-list">
        @foreach($services as $service)
            <div class="service-card">
                <h2>{{ $service['name'] }}</h2>
                <p>Price: ${{ $service['price'] }}</p>
                <p>Rating: {{ $service['rating'] }}</p>
                <a href="{{ route('services.show', $service['id']) }}">View Details</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
