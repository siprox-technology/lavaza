@extends('layouts.app')
@section('content')



    <main id="main">

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
                                    <p class="animate__animated animate__fadeInUp">اماده سازی با گوشت صد در صد خالص و کم چرب برگر با طعم اصیل را در لاوازا تجربه کنید</p>
                                    <div>
                                        <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">مشاهده منو</a>
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
                                    <p class="animate__animated animate__fadeInUp">محیط رستوران دارای فضای مجزا برای کافی شاپ و میتینگ های کاری شما</p>
                                    <div>
                                        <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">مشاهده منو</a>
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
        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container">
                <div class="section-title">
                    <h2>منوی <span>لذیذ</span></h2>
                </div>
                {{-- differnt menus i.e. Starter Main .... --}}
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">همه</li>
                            @foreach ($menus as $menu)
                                <li data-filter={{ '.filter-' . $menu->name_fa}}>{{ $menu->name_fa }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="menu-container row border border-warning p-2 p-md-4 p-lg-5 mt-3 mx-0 "style="border-radius:1.25rem">
                    {{-- menu items --}}
                    @foreach ($items as $item)
                    <div class="row w-100 menu-image mt-2 mt-sm-3 mt-md-4 menu-item  {{ 'filter-' . $item->menu->name_fa }}">
                        <div class="col-sm-8 w-100">
                            <div class="menu-content">
                                <a>{{ $item->name_fa }}</a><span>{{ $item->price }}</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $item->ingredients_fa }}
                            </div>
                            <div class="row justify-content-end mx-0 mt-3 w-100">
                                <label for="quantity" class="d-none"></label>
                                {{-- add to cart --}}
                                <form action="{{ route('cart.add') }}" method="GET">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="number" dusk="{{ 'quantity-input-' . $item->id }}" name="quantity" min="1"
                                        max="100" value="1" class="pl-1">
                                    <button type="submit" dusk="{{ 'submit-btn-' . $item->id }}" id="add-to-cart"
                                        class="btn btn-primary py-1 px-3">+</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-4 w-100 text-left text-sm-center mt-sm-3 mt-2">
                            <img height="150px" width="150px" style="border-radius:1.25rem" src="{{ asset('images/menu/' . $item->name_fa . '.jpg') }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Menu Section -->

        <!-- ======= Whu Us Section ======= -->
        <section id="why-us" class="why-us bg-light">
            <div class="container">

                <div class="section-title">
                    <h2>چرا <span>برگر لاواتزا</span></h2>
                    <p>عوامل متعدد و زیادی باعث  در کیفیت یک برگر واقعی و خوشمزه نقش دارند</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box">
                            <span>01</span>
                            <h4>کیفیت و تازگی گوشت</h4>
                            <p>اولین قدم در اماده سازی یک برگر لذیذ انخاب
                                 گوشت تازه و مناسب است.
                                  ما باور داریم یک برگر فقط یک قضای سریع یا فست فود نیست بلکه یک وعده غذایی کامل است
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box">
                            <span>02</span>
                            <h4>کیفیت نان</h4>
                            <p>یک نان سالم تازه و با کییفیت یکی از عناصر اصلی برگر با کییفیت است. ما نان برگر را در خود رستوران به صورت تازه در تنور و قبل از اماده سازی برگر تهیه میکنیم</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box">
                            <span>03</span>
                            <h4> اماده سازی و مواد اولیه</h4>
                            <p>داشتن مواد اولیه تازه به همراه ادویه های ممتاز تنها یک بخش از اماده سازی یک برگراصیل است. سر اشپز رستوران ما با داشتن سالها
                                 سابقه در اماده سازی برگر همواره یک برگر اب دار خوشمزه و در عین حال برشته برای شما اماده خواهد کرد
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Whu Us Section -->

        <!-- ======= Specials Section ======= -->
        <section id="specials" class="specials">
            <div class="container">

                <div class="section-title">
                    <h2>برگر های <span>مخصوص</span> سر آشپز </h2>
                    <p>برگر های زیر در روزهای پنجشنبه و جمعه و به صورت مخصوص و به سفارش مشتریان اماده سازی و سرو میشوند</p>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#hawaiian-burger">Hawaiian Burger</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#mexican-burger">Mexican Burger</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#newyork-burger">New York Burger</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="hawaiian-burger">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>برگر هاوایی</h3>
                                        <p class="font-italic">گوشت گوساله اناناس گریل شده پنیر موزا پیاز چوجه فرنگی کاهو مایونز سس باربکیو
                                        </p>
                                        <p> 
                                            همبرگر هاوایی یک برگر کاملا متفاوت و جالب است که با آناناس‌های گریل شده تهیه می‌شود و با سس مخصوص بسیار خوش طعم میشود.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('assets/img/hawaiian-burger.jpg')}}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="mexican-burger">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>برگر مکزیکی</h3>
                                        <p class="font-italic">گوشت چرخ کرده 
                                            پیاز رنده شده
                                            نمک و فلفل 
                                            خردل 
                                            فلفل سبز نرم شده
                                            کاهو
                                            سس گوجه فرنگی 
                                            سس مایونز 
                                            نان ساندویچ </p>
                                        <p>ین ساندویچ معمولا با خامه ترش یا سس تاکو و یا سس گوآکاموله سرو میشه یک طعم متفاوت تند و تیز مکزیکی برای این برگر مکزیکی کامل کننده و عالی میشه حتما این برگر را امتحان کنید.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('assets/img/mexican-burger.jpg')}}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="newyork-burger">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>برگر نیو یورک</h3>
                                        <p class="font-italic">برگر،فیله استریپس،پنیر گودا،قارچ بلانچ،سالاد سبز،سیب زمینی با سس پنی</p>
                                        <p>چیز برگر نیو یورکی یکی از انواع برگرهای معروف و خوشمزه در جهان است که به عنوان یک غذای پر طرفدار بین المللی در سراسر جهان شناخته می شود</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('assets/img/newyork-burger.jpg')}}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Specials Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact bg-light">
            <div class="container">

                <div class="section-title">
                    <h2><span>Contact</span> Us</h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque
                        vitae autem.</p>
                </div>
            </div>

            <div class="map">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container mt-5">

                <div class="info-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 info">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street<br>New York, NY 535022</p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="icofont-clock-time icofont-rotate-90"></i>
                            <h4>Open Hours:</h4>
                            <p>Monday-Saturday:<br>11:00 AM - 2300 PM</p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
                        </div>
                    </div>
                </div>

                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                            data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required"
                            data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->


@endsection
