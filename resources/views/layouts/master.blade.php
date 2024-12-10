<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add your CSS and JS links here -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')
</head>
<body>
    <header>
        <div style="background-color: rgb(255, 74, 74); padding: 16px 0;">
            <p style="font-size: 2rem; text-align: center; font-style: oblique;">50% Off! Merry Christmas :)</p>
        </div>
    </header>

    <!-- <aside>
        Side bar content will come here but we do not have any use for a side bar so not putting it
        @yield('sidebar-content')
    </aside> -->
    
        <main>
            @yield('content')
        </main>

        <footer>
            <div class="footer-content">
              <p>Contact us: pkguides@example.com | +123 456 7890</p>
              <p>
                Follow us: <a href="#" class="nav-link">Facebook</a> |
                <a href="#" class="nav-link">Instagram</a> |
                <a href="#" class="nav-link">Twitter</a>
              </p>
              <p>© 2024 PK Guides. All Rights Reserved.</p>
            </div>
          </footer>

          @yield('js')
</body>
</html>
