<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> لاواتزا - طعمی متفاوت از برگر</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container text-center">
            <i class="icofont-phone"></i> +۹۸ ۹۰۰۰۰۰۰
            <i class="icofont-clock-time icofont-rotate-180"></i> همه روزه از ۱۱ صبح تا ۱۱ شب
        </div>
    </section>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center mt-1">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1 class="text-light"><a href="{{ route('home') }}"><span>Lavaza</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>{{-- {{dd(request()->path())}} --}}
                    <li class="text-right"><a href="{{ route('home') }}">خانه</a></li>
                    <li class="text-right"><a href="{{ route('home', ['#menu']) }}">مشاهده منو</a></li>
                    <li class="text-right"><a href="{{ route('home', ['#why-us']) }}">درباره ما</a></li>
                    <li class="text-right"><a href="{{ route('home', ['#specials']) }}">مخصوص سر اشپز</a></li>
                    <li class="text-right"><a href="{{ route('home', ['#contact']) }}">ارتباط با ما</a></li>
                    @guest
                        <li class="text-right"><a href="{{ route('register.index') }}">ثبت نام</a></li>
                        <li class="text-right "><a dusk="login_link" class="text-success"
                                href=" {{ route('login.index', ['#login']) }}">ورود کاربر</a></li>
                    @endguest
                    @auth
                        @if (auth()->user()->role == 1)
                            <li class="text-right"><a href="{{ route('admin.index', ['#admin']) }}"
                                    class="text-warning">پنل ادمین</a></li>
                        @else
                            <li class="text-right"><a href="{{ route('dashboard.index', ['#dashboard']) }}"
                                    class="text-warning">حساب کاربری</a></li>
                        @endif
                        <li class="text-right"><a dusk="Logout" class="text-danger"
                                href="{{ route('logout') }}">خروج</a></li>
                    @endauth
                </ul>
            </nav><!-- .nav-menu -->
            {{-- Shopping basket --}}
            <div class="cart mr-5 mr-sm-0">
                <button id="cartOpen" dusk="cartOpen" class="btn-cart d-flex py-sm-2 px-sm-3 p-2">
                    <i class="icofont-shopping-cart mr-2 d-sm-none"></i><span class="mr-3 d-sm-block d-none"
                        style="margin-bottom: 3px">سبد خرید</span>
                    <div class="shopping-cart">
                        <p class=" m-0 text-center">
                            <!-- get number of items in basket -->
                            {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                        </p>
                    </div>
                </button>
                {{-- cart links --}}
                <div class="cart-wrapper p-3 border rounded border-warning ">
                    <h4 class="mb-4 text-white text-center">سبد خرید</h4>
                    <ul class="pl-0 mb-3">
                        @if (Session::has('cart'))
                            @foreach (Session::get('cart')->items as $item)
                                <li class="d-flex p-3 mb-2 border border-warning rounded">

                                    {{-- remove item --}}
                                    <a href="{{ route('cart.remove', $item['item']) }}"
                                        class="text-danger mr-2">X</a>
                                    <img class="" style=" width:50px; height:50px; border-radius: 1.1rem"
                                        src="{{ asset('images/menu/' . $item['item']['name_fa'] . '.jpg') }}"
                                        alt="product-img">

                                    <div class="mx-3 ml-auto text-right">
                                        {{-- item quantity --}}
                                        <p class="mb-0 text-warning">{{ $item['item']['name_fa'] }}</p>
                                        <span class="text-white">تعداد :</span>
                                        <span class="text-white">{{ $item['quantity'] }}</span>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="d-flex justify-content-center border-bottom">
                                <p class=" text-warning">سبد شما خالی است </p>
                            </li>
                        @endif

                    </ul>
                    <div class="mb-3 text-white row px-3">
                        <p class="mr-auto text-warning">
                            {{ Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 0) : '0' }}</p>
                        <p class="ml-auto">: جمع سفارش</p>
                    </div>
                    <div class="text-center text-white row justify-content-between px-3">
                        <a href="{{ route('cart.removeAll') }}" dusk="delete_whole_cart_link"
                            class="btn btn-danger {{ Session::has('cart') ? '' : 'd-none' }}">حذف سبد خرید</a>
                        <a href="{{ route('order.index', '#order') }}" dusk="order_process_link"
                            class="btn btn-dark {{ Session::has('cart') ? '' : 'd-none' }}">ادامه فرایند خرید</a>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active"
                        style="background: url({{ asset('assets/img/slide/slide-1.jpg') }});">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>طعمی واقعی</span> از برگر</h2>
                                <p class="animate__animated animate__fadeInUp">اماده سازی با گوشت صد در صد خالص و کم چرب
                                </p>
                                <p class="animate__animated animate__fadeInUp">برگر با طعم اصیل را در لاوازا تجربه کنید
                                </p>
                                <div>
                                    @if (request()->url() == '/')
                                        <a href="#menu"
                                            class="btn-menu animate__animated animate__fadeInUp scrollto">مشاهده منو</a>
                                    @else
                                        <a href="{{ route('home', '#menu') }}"
                                            class="btn-menu animate__animated animate__fadeInUp scrollto">مشاهده منو</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item"
                        style="background: url({{ asset('assets/img/slide/slide-2.jpg') }});">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">محیطی <span>آرام</span> و دلپذیر</h2>
                                <p class="animate__animated animate__fadeInUp">محیط رستوران دارای فضای مجزا برای کافی
                                    شاپ و میتینگ های کاری شما</p>
                                <div>
                                    <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">مشاهده
                                        منو</a>
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
    <div id="content">
        @yield('content')
    </div>


    <!-- Template Main JS File -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>Lavaza</h3>
            <p>طعمی متفاوت از برگر</p>
            <div class="social-links">
                <a class="twitter"><i class="bx bxl-twitter"></i></a>
                <a class="facebook"><i class="bx bxl-facebook"></i></a>
                <a class="instagram"><i class="bx bxl-instagram"></i></a>
                <a class="google-plus"><i class="bx bxl-skype"></i></a>
                <a class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="credits">
                <a target="_blank" href="https://siprox-tech.com/">SIPROX TECHNOLOGY</a> طراحی توسط
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
