@extends('layouts.app')
@section('content')
    <main id="main">
        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container">
                <div class="section-title">
                    <h2>منوی <span>لذیذ</span></h2>
                </div>
                {{-- differnt menus i.e. Starter Main .... --}}
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-filters">
                            @foreach ($menus as $menu)
                                <li dusk="{{$menu->name}}_filter_btn" data-filter={{ '.filter-' . $menu->name_fa}} id="{{ 'filter-' . $menu->name}}">{{ $menu->name_fa }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="menu-container border-warning mt-3 mx-0 overflow-auto"style=" max-height:508px">
                    {{-- menu items --}}
                    @foreach ($items as $item)
                    <div class="col-md-6 col-lg-4 col-12 menu-item py-3 {{ 'filter-' . $item->menu->name_fa }}" id="menu-item">
                        <div class="row mx-auto p-0 border border-dark rounded p-3" style="min-height:220px">
                            <div class="col-sm-8 p-0">
                                <div class="menu-content">
                                    <p>{{ $item->name_fa }}</p><span>{{number_format($item->price,0) }}</span>
                                </div>
                                <div class="menu-ingredients">
                                    {{ $item->ingredients_fa }}
                                </div>
                            </div>
                            <div class="col-sm-4 menu-image text-left text-sm-right px-0 my-2 mx-sm-0">
                                <img height="75px" width="75px" style="border-radius:1.25rem" src="{{ asset('images/menu/' . $item->name_fa . '.jpg') }}" alt="">
                            </div>
                            <div class="row justify-content-end mx-0 mt-3 w-100 px-0 ">
                                <label for="quantity" class="d-none"></label>
                                {{-- add to cart --}}
                                <form action="{{ route('cart.add') }}" method="GET">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="number" dusk="{{ 'quantity-input-' . $item->id }}" name="quantity" min="1"
                                        max="100" value="1" class="pl-1">
                                    <button type="submit" dusk="{{ 'submit-btn-' . $item->id }}" id="add-to-cart"
                                        class="btn py-1 px-3">+</button>
                                </form>
                            </div>
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
                    <p>عوامل زیادی در کیفیت یک برگر واقعی و خوشمزه نقش دارند</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box text-right">
                            <span>03</span>
                            <h4>کیفیت و تازگی گوشت</h4>
                            <p>اولین قدم در اماده سازی یک برگر لذیذ انخاب
                                 گوشت تازه و مناسب است.
                                 ما باور داریم یک برگر فقط یک غذای سریع یا فست فود نیست بلکه یک وعده غذایی کامل است
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box text-right">
                            <span>02</span>
                            <h4>کیفیت نان</h4>
                            <p>یک نان سالم تازه و با کییفیت یکی از عناصر اصلی برگر با کییفیت است. ما نان برگر را در خود رستوران به صورت تازه در تنور و قبل از اماده سازی برگر تهیه میکنیم</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box text-right">
                            <span>01</span>
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
                    <p>برگر های زیر در روزهای پنجشنبه و جمعه به صورت مخصوص و به سفارش مشتریان اماده سازی و سرو میشوند</p>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#hawaiian-burger">برگر هاوایی</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#mexican-burger">برگر مکزیکی</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#newyork-burger">برگر نیو یورک</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="hawaiian-burger">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 text-right">
                                        <h3>برگر هاوایی</h3>
                                        <p class="font-italic">گوشت گوساله اناناس گریل شده پنیر موزارلا پیاز گوجه فرنگی کاهو مایونز سس باربکیو
                                        </p>
                                        <p> 
                                            همبرگر هاوایی یک برگر کاملا متفاوت و جالب است که با آناناس‌های گریل شده تهیه می‌شود و با سس مخصوص بسیار خوش طعم میشود</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('assets/img/hawaiian-burger.jpg')}}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="mexican-burger">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 text-right">
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
                                        <p>این ساندویچ معمولا با خامه ترش یا سس تاکو و یا سس گوآکاموله سرو میشود. یک طعم تند و تیز مکزیکی برای این برگر کامل کننده و عالی میشود حتما این برگر را امتحان کنید.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset('assets/img/mexican-burger.jpg')}}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="newyork-burger">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 text-right">
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
                    <h2><span>ارتباط</span> با ما</h2>
                    <p>شما میتوانید از راههای زیر با ما در تماس باشید</p>
                </div>
            </div>

            <div class="container mt-5">
                <div class="info-wrap">
                    <div class="row">
                        <div class="col-lg-4 bg-light col-md-6 info text-right">
                            <i class="icofont-google-map"></i>
                            <h4>ادرس</h4>
                            <p>خیابان فرهاد ۲۱ پلاک  ۱۲۵<br>مشهد</p>
                        </div>
                        <div class="col-lg-4 bg-light col-md-6 info mt-4 mt-lg-0 text-right">
                            <i class="icofont-clock-time icofont-rotate-90"></i>
                            <h4>ساعات کار</h4>
                            <p>همه روزه از:<br>۱۱ صبح تا ۱۱ شب</p>
                        </div>
                        <div class="col-lg-4 bg-light col-md-6 info mt-4 mt-lg-0 text-right">
                            <i class="icofont-phone"></i>
                            <h4>تلفن</h4>
                            <p>+۹۸ ۹۳۷۱۳۷۳۹۲۹</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
@endsection
