<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PK Guides</title>
  <link rel="icon" type="image/png" href="assets/logo.png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/services.style.css') }}">
</head>

<body>

  <script src="{{asset('js/services.js')}}"></script> -->

  @extends('layouts.master')

  @section('title', 'Services')

  @section('styles')
  <link rel="stylesheet" href="{{ asset('css/services.style.css') }}">
  @endsection

  @section('content')
  <header class="main-header">
    <section class="header-section">
      <div class="logo-container">
        <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo" />
      </div>
      
      <nav class="navbar">
        <a href="/" class="nav-link">Home</a>
        <a href="/about" class="nav-link">About Us</a>
        <a href="/services" class="nav-link">Services</a>
            <button onclick="logout()" class="nav-link logout">Logout</a>
    </nav>
    </section>

    <h1 class="header-text">What PK-Guides Offers !!</h1>
  </header>

  <div class="carousel">
    <div class="carousel-title">
      <h2>Popular Activities</h2>
      <p>
        We offer you the most exciting activities so you can have the most
        unforgettable vacations.
      </p>
    </div>
    <div class="carousel-wrapper">
      <!-- Hidden Radio Inputs -->
      <input type="radio" name="carousel" id="item-1" checked />
      <input type="radio" name="carousel" id="item-2" />
      <input type="radio" name="carousel" id="item-3" />

      @if (count($services) === 0)
  <div style="text-align: center; margin: 50px 0; font-size: 1.5rem;">
    <p>No services added! Add services by clicking the + icon.</p>
  </div>
  @endif


      <div class="carousel">
        
      
        @foreach ($services as $index => $service)
        <div class="carousel-item @if($index === 0) active @endif">
          <div class="card" id="card{{ $index + 1 }}">
            <img src="{{ $service->image_url }}" alt="{{ $service->name }}" />
            <div class="card-body">
              <h3 class="card-title">{{ $service->name }}</h3>
              <div class="card-description-container">
                <p class="card-description" id="details{{ $index + 1 }}">
                  {{ $service->description }}
                </p>
                <div class="button-container">
                  <button class="add-cart-btn" onclick="addToCart('{{ $service->name }}')">Add to Cart</button>
                  <button class="btn" onclick="showDetails('details{{ $index + 1 }}')">Show Details</button>
                  <button class="btn" onclick="hideDetails('details{{ $index + 1 }}')">Hide Details</button>
                  <button class="btn" onclick="changeBackgroundColor('card{{ $index + 1 }}')">Change Background Color</button>
                  
                  <button class="btn" onclick="openUpdateModal({{ $service->id }}, '{{ $service->name }}', '{{ $service->description }}', '{{ $service->image_url }}')">Update Service</button>



                  <form action="/remove-service" method="post">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                  <button class="btn remove-cart-btn" type="submit">Remove Service</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      </div>

      <!-- Sticky Cart Button -->
      <button class="sticky-cart-btn" onclick="openCartModal()">
        <?xml version="1.0"  encoding="utf-8"?>
        <svg fill="white" version="1.1" id="Layer_1"
          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          viewBox="0 0 122.9 107.5" style="enable-background: new 0 0 122.9 107.5" xml:space="preserve">
          <g>
            <path
              d="M3.9,7.9C1.8,7.9,0,6.1,0,3.9C0,1.8,1.8,0,3.9,0h10.2c0.1,0,0.3,0,0.4,0c3.6,0.1,6.8,0.8,9.5,2.5c3,1.9,5.2,4.8,6.4,9.1 c0,0.1,0,0.2,0.1,0.3l1,4H119c2.2,0,3.9,1.8,3.9,3.9c0,0.4-0.1,0.8-0.2,1.2l-10.2,41.1c-0.4,1.8-2,3-3.8,3v0H44.7 c1.4,5.2,2.8,8,4.7,9.3c2.3,1.5,6.3,1.6,13,1.5h0.1v0h45.2c2.2,0,3.9,1.8,3.9,3.9c0,2.2-1.8,3.9-3.9,3.9H62.5v0 c-8.3,0.1-13.4-0.1-17.5-2.8c-4.2-2.8-6.4-7.6-8.6-16.3l0,0L23,13.9c0-0.1,0-0.1-0.1-0.2c-0.6-2.2-1.6-3.7-3-4.5 c-1.4-0.9-3.3-1.3-5.5-1.3c-0.1,0-0.2,0-0.3,0H3.9L3.9,7.9z M96,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C86.4,92.6,90.7,88.3,96,88.3L96,88.3z M53.9,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C44.3,92.6,48.6,88.3,53.9,88.3L53.9,88.3z M33.7,23.7l8.9,33.5h63.1l8.3-33.5H33.7L33.7,23.7z" />
          </g>
        </svg>
        <div class="notification-circle" id="cartCounter" style="display: none">0</div>
      </button>

      @if(count($services) < 3)
<button class="sticky-add-btn" onclick="openAddModal()">
    +
</button>
@endif


      <!-- Cart Modal -->
      <div id="cartModal" class="cart-modal">
        <div class="cart-modal-content">
          <span class="close-btn" onclick="closeCartModal()">&times;</span>
          <h2>Cart</h2>
          <div id="cartItems">
            <!-- Cart items will be dynamically added here -->
          </div>
          <button class="checkout-btn" id="checkoutBtn" style="display: none;">Proceed to Checkout</button>

        </div>
      </div>

      <!-- Add Modal -->
<!-- Add Modal -->
<div id="addModal" class="cart-modal">
  <div class="cart-modal-content">
      <span class="close-btn" onclick="closeAddModal()">&times;</span>
      <h2>Add A Service</h2>
      <form action="/add-service" method="POST">
        @csrf
          
          <!-- Name Field -->
          <div class="form-group">
              <label for="serviceName">Service Name:</label>
              <input type="text" id="serviceName" name="name" class="form-control" placeholder="Enter service name" required>
          </div>

          <!-- Description Field -->
          <div class="form-group">
              <label for="serviceDescription">Description:</label>
              <textarea id="serviceDescription" name="description" class="form-control" rows="4" placeholder="Enter a brief description" required></textarea>
          </div>

          <!-- Image URL Field -->
          <div class="form-group">
              <label for="serviceImageUrl">Image URL:</label>
              <input type="url" id="serviceImageUrl" name="image_url" class="form-control" placeholder="Enter image URL" required>
          </div>

          <!-- Submit Button -->
              <button type="submit" class="btn-submit">Add Service</button>
      </form>
  </div>
</div>

<div id="updateModal" class="cart-modal">
  <div class="cart-modal-content">
      <span class="close-btn" onclick="closeUpdateModal()">&times;</span>
      <h2>Update A Service</h2>
      <form action="/update-service" method="POST">
        @csrf

        <!-- Hidden input for service ID -->
        <input type="hidden" name="service_id" id="updateServiceId">

        <!-- Name Field -->
        <div class="form-group">
            <label for="serviceName">Service Name:</label>
            <input type="text" id="serviceName" name="name" class="form-control" placeholder="Enter service name">
        </div>

        <!-- Description Field -->
        <div class="form-group">
            <label for="serviceDescription">Description:</label>
            <textarea id="serviceDescription" name="description" class="form-control" rows="4" placeholder="Enter a brief description"></textarea>
        </div>

        <!-- Image URL Field -->
        <div class="form-group">
            <label for="serviceImageUrl">Image URL:</label>
            <input type="url" id="serviceImageUrl" name="image_url" class="form-control" placeholder="Enter image URL">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-submit">Update Service</button>
      </form>
  </div>
</div>



    </div>
  </div>

  @endsection


  @section('js')
  <script src="{{ asset('js/services.js') }}"></script>
  @endsection

  

  
<!-- </body>

</html> -->