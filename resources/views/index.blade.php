<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PK Guides</title>
    <link rel="stylesheet" href="home.style.css" />
    <link rel="stylesheet" href="{{ asset('css/home.style.css') }}">
</head>

<body>
    <header class="main-header">
        <section class="header-section">
            <div class="logo-container">
                <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo">
            </div>
            <nav class="navbar">
                <a href="/" class="nav-link">Home</a>
                <a href="/about" class="nav-link">About Us</a>
                <a href="/services" class="nav-link">Services</a>
            </nav>
        </section>

        <div class="intro-section">
            <h1 class="slogan">From the Peaks of K2 to the Streets of Lahore</h1>

            <div class="flex-col">

                <a class="button arrow" href="#contact-form">Register Now</a>
                <button class="text-style-btn"
                id="change-style">Change Text Style</button>
                <button class="text-style-btn"
                id="reset-style">Reset Text Style</button>
            </div>
                
        </div>


        

        <div class="services-container">
            <div class="service">
                <div class="service-icon-container">
                    <img src="assets/city-icon.png" alt="icon" class="service-icon" />
                </div>
                <h2 class="service-heading">City Tours</h2>
                <p class="service-description">
                    Explore major attractions and hidden gems in a city, guided by local
                    insights and stories.
                </p>
            </div>

            <div class="service">
                <div class="service-icon-container">
                    <img src="assets/adventure-icon.png" alt="icon" class="service-icon" />
                </div>
                <h2 class="service-heading">Adventure Tours</h2>
                <p class="service-description">
                    Engage in thrilling outdoor activities like hiking, zip-lining, or
                    rock climbing in scenic locations.
                </p>
            </div>

            <div class="service">
                <div class="service-icon-container">
                    <img src="assets/vase.png" alt="icon" class="service-icon" />
                </div>
                <h2 class="service-heading">Cultural Experiences</h2>
                <p class="service-description">
                    Immerse yourself in local culture through food tastings, traditional
                    crafts, and local festivals.
                </p>
            </div>

            <div class="service">
                <div class="service-icon-container">
                    <img src="assets/history.png" alt="icon" class="service-icon" />
                </div>
                <h2 class="service-heading">Historical Tours</h2>
                <p class="service-description">
                    Discover historical sites and learn about significant events that
                    shaped the area.
                </p>
            </div>

            <div class="service">
                <div class="service-icon-container">
                    <img src="assets/restaurant.png" alt="icon" class="service-icon" />
                </div>
                <h2 class="service-heading">Food Tours</h2>
                <p class="service-description">
                    Sample local cuisine at markets and restaurants, exploring culinary
                    traditions and specialties.
                </p>
            </div>

            <div class="service">
                <div class="service-icon-container">
                    <img src="assets/nature.png" alt="icon" class="service-icon" />
                </div>
                <h2 class="service-heading">Nature Tours</h2>
                <p class="service-description">
                    Experience the beauty of local ecosystems through guided hikes and
                    wildlife watching.
                </p>
            </div>
        </div>
    </header>

    <section class="main-destinations">
        <h1 class="main-destinations-title">Main Destinations</h1>

        <div class="main-destinations-container">
            <div class="destination" style="
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('assets/hunzaa.jpg') center/cover no-repeat;
            ">
                <div class="destination-header">
                    <h2 class="destination-title">Hunza Valley</h2>
                </div>
                <p class="destination-description">
                    Famous for its stunning landscapes, ancient forts, and views of
                    towering peaks like Rakaposhi.
                </p>
            </div>

            <div class="destination" style="
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('assets/swat.jpeg') center/cover no-repeat;
            ">
                <div class="destination-header">
                    <h2 class="destination-title">Swat Valley</h2>
                </div>
                <p class="destination-description">
                    Known as the "Switzerland of the East," Swat offers lush valleys,
                    rivers, and skiing in Malam Jabba.
                </p>
            </div>

            <div class="destination" style="
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('assets/skardu.jpeg') center/cover no-repeat;
            ">
                <div class="destination-header">
                    <h2 class="destination-title">Skardu</h2>
                </div>
                <p class="destination-description">
                    A gateway to K2, Skardu features serene lakes and majestic
                    mountains, perfect for trekking and adventure.
                </p>
            </div>

            <div class="destination" style="
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('assets/lahore.jpeg') center/cover no-repeat;
            ">
                <div class="destination-header">
                    <h2 class="destination-title">Lahore</h2>
                </div>
                <p class="destination-description">
                    The cultural heart of Pakistan, with landmarks like Lahore Fort,
                    Badshahi Mosque, and vibrant street food.
                </p>
            </div>

            <div class="destination" style="
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('assets/kiranchi.jpeg') center/cover no-repeat;
            ">
                <div class="destination-header">
                    <h2 class="destination-title">Karachi</h2>
                </div>
                <p class="destination-description">
                    A bustling city with beautiful beaches, lively markets, and
                    historical sites like Mohatta Palace.
                </p>
            </div>

            <div class="destination" style="
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('assets/fairy-meadows.jpeg') center/cover no-repeat;
            ">
                <div class="destination-header">
                    <h2 class="destination-title">Fairy Meadows</h2>
                </div>
                <p class="destination-description">
                    A scenic plateau near Nanga Parbat, offering spectacular views and a
                    tranquil escape for nature lovers.
                </p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h1 class="main-destinations-title">Testimonials</h1>

        <div class="testimonial">
            <div class="testimonial-text-container">
                <h3 class="testimonial-text">
                    “ … as a business owner I’m constantly looking for new experiences to
                    help reinforce what I provide to my customers. The welcoming and
                    facilities offered by the company were extraordinary and made me think
                    about how to improve my customer relations.”
                </h3>
                <p class="testimonial-name">- Lana</p>
            </div>

            <div class="testimonial-image-container">
                <img src="assets/test2.jpeg" alt="person" class="testimonial-image" />
            </div>
        </div>

        <div class="testimonial">
            <div class="testimonial-text-container">
                <h3 class="testimonial-text">
                    “… We wanted to do something different on our holiday besides just the usual relaxing on beach.
                    You
                    know it would be good to do that something extra that was fun, exciting and energetic.”
                </h3>
                <p class="testimonial-name">- Alex</p>
            </div>

            <div class="testimonial-image-container">
                <img src="assets/test1.jpeg" alt="person" class="testimonial-image" />
            </div>
        </div>

        <div class="testimonial">
            <div class="testimonial-text-container">
                <h3 class="testimonial-text">
                    “… The teaching and instruction are absolutely dynamic; they have the ability to plan and
                    organise the events at a level suited to the client. I just look at the number of clients that have
                    had some type of disability and what he has managed to do for them.”
                </h3>
                <p class="testimonial-name">- Zuri</p>
            </div>

            <div class="testimonial-image-container">
                <img src="assets/test3.jpeg" alt="person" class="testimonial-image" />
            </div>
        </div>
    </section>


    <section class="form" id="contact-form">
        <h1 class="main-destinations-title">Contact Us</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"  placeholder="Enter Your Name" />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  placeholder="Enter Your Email" />
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone"  placeholder="XXX-XXXXXXX" />
            </div>

            <div class="form-group">
                <label for="message">Expectations:</label>
                <textarea id="message" name="message" rows="4"  placeholder="Enter Your Expectations from Us"></textarea>
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </section>



    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
          <p>Contact us: pkguides@example.com | +123 456 7890</p>
          <p>Follow us:
            <a href="#" class="nav-link">Facebook</a> |
            <a href="#" class="nav-link">Instagram</a> |
            <a href="#" class="nav-link">Twitter</a>
          </p>
          <p>© 2024 PK Guides. All Rights Reserved.</p>
        </div>
      </footer>

      <script src="{{ asset('js/home.js') }}"></script>

</body>

</html>