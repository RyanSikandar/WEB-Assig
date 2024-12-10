<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PK Guides</title>
  <link rel="icon" type="image/png" href="assets/logo.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/about.style.css') }}">
</head>

<body>
  <script src="{{asset('js/about.js')}}"></script> -->

  @extends('layouts.master')

  @section('title', 'About Us')

  @section('styles')
  <link rel="stylesheet" href="{{ asset('css/about.style.css') }}">
  @endsection

  @section('content')
  <header class="main-header">
    <section class="header-section">
      <div class="logo-container">
        <img src="assets/logo.png" alt="logo" class="logo">
      </div>
      
      <nav class="navbar">
        <a href="/" class="nav-link">Home</a>
        <a href="/about" class="nav-link">About Us</a>
        <a href="/services" class="nav-link">Services</a>
            <button onclick="logout()" class="nav-link logout">Logout</a>
    </nav>
    </section>

    <h1 class="header-text">Home | About Us</h1>
  </header>

  <section class="about-section">

    <div class="first-half">

      <h2 class="first-half-heading">Our Mission</h2>

      <p class="first-half-text">At Adventure Holidays, we aim to provide unforgettable travel experiences that connect people with nature and culture. Our goal is to inspire exploration and promote sustainable tourism.</p>

      <p class="first-half-text">We believe that travel enriches lives and fosters understanding among diverse cultures. Join us in exploring breathtaking landscapes and discovering unique traditions.</p>

      <div class="features">

        <div class="text-with-icon">

          <img src="assets/star-icon.png" alt="Star Icon" class="icon">

          <div class="text-of-icon">

            <h3 class="text-of-icon-heading">Expert Guides</h3>

            <p class="text-of-icon-text">Our knowledgeable guides are passionate about sharing their expertise, ensuring you have a safe and enriching adventure.</p>
          </div>

        </div>

        <div class="text-with-icon">

          <img src="assets/support-icon.png" alt="Support Icon" class="icon">

          <div class="text-of-icon">

            <h3 class="text-of-icon-heading">24/7 Support</h3>

            <p class="text-of-icon-text">We offer round-the-clock support to assist you with any inquiries, ensuring a smooth and enjoyable journey.</p>
          </div>

        </div>

      </div>

    </div>

    <div class="second-half">

      <img src="assets/margalla-trail.webp" alt="Margalla Hills" class="about-section-image">

    </div>

  </section>

  <section class="our-team">
    <div class="our-team-heading">
      <h2>Our Team</h2>
      <p>We are a team of dedicated professionals committed to providing exceptional travel experiences.</p>
    </div>
  
    <div class="team-pics">
      <div class="team-member">
        <img src="assets/faizan.jpeg" alt="Ahmed Faizan">
        <div class="social-text">
          <a href="https://www.linkedin.com/in/ahmed-faizan-59b05719b/" target="_blank"><span>LinkedIn /</span></a>
          <a href="mailto:faizanofficail120@gmail.com"><span>Email</span></a>
        </div>
        <div class="team-info">
          <h3>Ahmed Faizan</h3>
          <p>CEO/CTO/CFO/CXO</p>
        </div>
      </div>
  
      <div class="team-member">
        <img src="assets/ryan.jpg" alt="Rayan Sikandar">
        <div class="social-text">
          <span>LinkedIn</span>
          <span>Email</span>
        </div>
        <div class="team-info">
          <h3>Rayan Sikandar</h3>
          <p>Individual Contributor</p>
        </div>
      </div>
  
      <div class="team-member">
        <img src="assets/pic-1-team.jpg" alt="Waqas Ali Quershis">
        <div class="social-text">
          <span>LinkedIn</span>
          <span>Email</span>
        </div>
        <div class="team-info">
          <h3>Waqas Ali Quershis</h3>
          <p>Individual Contributor</p>
        </div>
      </div>
    </div>
  </section>
  @endsection
  
  @section('js')
  <script src="{{ asset('js/about.js') }}"></script>
  @endsection
  

<!-- </body>

</html> -->
