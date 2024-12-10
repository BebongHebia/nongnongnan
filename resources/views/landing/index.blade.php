<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="OBMSDT - Barangay Old Nongnongnan Official Site">
    <meta name="keywords" content="OBMSDT, Barangay, Community, Nongnongnan, Official">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>OBMSDT</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('landing_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('landing_assets/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
            /* Apply background image to main banner */
      .main-banner {
          background-image: url('{{ asset("images/background.jpg") }}');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
          height: 100vh; /* Ensure the banner takes up full viewport height */
          display: flex;
          justify-content: center; /* Center horizontally */
          align-items: center; /* Center vertically */
      }

      /* Adjust the header text */
      .header-text {
          text-align: center; /* Ensure the text is centered horizontally */
          color: white;
          font-size: 2em;
      }

      .header-text .category em {
          font-weight: bold;
      }

    </style>
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader" style="background-color: #3A6C7C;">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky" style="background-color: #3A6C7C;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h1>OBMSDT</h1>
                        </a>
                        <ul class="nav">
                            <li><a href="{{url('/login-page')}}"><i class="fa fa-user-secret" aria-hidden="true"></i> Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Banner Section Start ***** -->
    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Brgy. <em>Old Nongnongnan, Don Carlos, Bukdinon</em></span>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Section End ***** -->

      <!-- Footer Section Start -->
      <footer style="background-color: #3A6C7C; color: white; padding: 20px 0;">
          <div class="container">
              <div class="row">
                  <div class="col-12 text-center">
                      <p>Copyright © 2024 OBMSDT All rights reserved.</p>
                  </div>
              </div>
          </div>
      </footer>
      <!-- Footer Section End -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('landing_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('landing_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing_assets/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('landing_assets/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('landing_assets/assets/js/counter.js') }}"></script>
    <script src="{{ asset('landing_assets/assets/js/custom.js') }}"></script>
</body>
</html>
