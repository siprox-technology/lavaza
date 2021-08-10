<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Delicious Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
      <!-- ======= Top Bar ======= -->
      <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-transparent">
        <div class="container text-right">
          <i class="icofont-phone"></i> +1 5589 55488 55
          <i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 11:00 AM - 23:00 PM
        </div>
        <div class="cart">
          <button id="cartOpen" class="cart-btn d-flex">
              <i class="fas fa-shopping-cart mt-3"></i><span class="d-xs-none">CART </span>

                  <div class="shopping-cart">
                      <p class="m-0 text-center">
                          <!-- get number of items in basket -->
                          {{Session::has('cart')?Session::get('cart')->totalQty:'0'}}
                      </p>
                  </div>
          </button>
          {{-- cart links --}}
          <div class="cart-wrapper">
              <i id="cartClose" class="cart-close">X</i>
              <h4 class="mb-4 text-dark">Your Cart</h4>
              <ul class="pl-0 mb-3">
                  @if (Session::has('cart'))
                      @foreach (Session::get('cart')->items as $item)
                          <li class="d-flex border-bottom">
                              <img class="" style="width:50px; height:50px;" 
                              src="{{asset('images/menu/'.$item['item']['name'].'.jpg')}}" alt="product-img">
                              <div class="mx-3">
                                  <p class="mb-0 text-dark">{{$item['item']['name']}}</p>
                                  <span class="text-dark">{{$item['quantity']}}</span> 
                                  <span class="text-dark">X</span> 
                                  <span class="text-dark">${{$item['price']}}</span>
                              </div>
                              {{-- remove item --}}
                              <a href ="{{route('cart.remove',$item['item'])}}" class="text-danger">X</a>
                          </li>
                      @endforeach
                  @else
                  <li class="d-flex border-bottom">
                      <p class="text-center text-warning">Shopping cart empty !</p>
                  </li>
                  @endif

              </ul>
              <div class="mb-3 text-dark">
                  <span>Cart Total</span>
                  <span class="float-right">{{(Session::has('cart'))?Session::get('cart')->totalPrice:'0'}}</span>
              </div>
              <div class="text-center text-dark">
                  <a href="{{route('cart.index')}}" class="btn btn-dark btn-mobile rounded-0 {{Session::has('cart')?'':'d-none'}}">view cart</a>
                  <a href="#" class="btn btn-dark btn-mobile rounded-0 {{Session::has('cart')?'':'d-none'}}">check out</a>
              </div>
          </div>
        </div>
      </section>
    
      <!-- ======= Header ======= -->
      <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">
    
          <div class="logo mr-auto">
            <h1 class="text-light"><a href="index.html"><span>Delicious</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
          </div>
    
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="index.html">Home</a></li>
              @guest
                <li class=""><a href="{{route('register.index')}}">Register</a></li>
                <li class=""><a href="{{route('login.index')}}">Login</a></li>
              @endguest
              @auth
                @if (auth()->user()->role == 1)
                  <li><a href="{{route('admin.index')}}">Admin</a></li>
                @else
                  <li><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                @endif

                <li class=""><a dusk="Logout" href="{{route('logout')}}">Logout</a></li>
              @endauth

              <li><a href="#about">About</a></li>
              <li><a href="#menu">Menu</a></li>
              <li><a href="#specials">Specials</a></li>
              <li><a href="#events">Events</a></li>
              <li><a href="#chefs">Chefs</a></li>
              <li><a href="#gallery">Gallery</a></li>
              <li><a href="#contact">Contact</a></li>
              
              <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li>
            </ul>
          </nav><!-- .nav-menu -->
    
        </div>
      </header><!-- End Header -->
    
      <!-- ======= Hero Section ======= -->
      <section id="hero">
        <div class="hero-container">
          <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    
            <div class="carousel-inner" role="listbox">
    
              <!-- Slide 1 -->
              <div class="carousel-item active" style="background: url({{asset('assets/img/slide/slide-1.jpg')}});">
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2 class="animate__animated animate__fadeInDown"><span>Delicious</span> Restaurant</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                      <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                      <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                    </div>
                  </div>
                </div>
              </div>
    
              <!-- Slide 2 -->
              <div class="carousel-item" style="background: url({{asset('assets/img/slide/slide-2.jpg')}});">
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                      <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                      <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                    </div>
                  </div>
                </div>
              </div>
    
              <!-- Slide 3 -->
              <div class="carousel-item" style="background: url({{asset('assets/img/slide/slide-3.jpg')}});">
                <div class="carousel-background"><img src="{{asset('assets/img/slide/slide-3.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                      <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                      <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                    </div>
                  </div>
                </div>
              </div>
    
            </div>
    
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
    
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
    
          </div>
        </div>
      </section><!-- End Hero -->


      @yield('content')


      <!-- Template Main JS File -->
      <!-- ======= Footer ======= -->
      <footer id="footer">
        <div class="container">
          <h3>Delicious</h3>
          <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
          <div class="social-links">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
          <div class="copyright">
            &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </footer><!-- End Footer -->
    
      <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
      <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
