@extends('layouts.app')

@section('content')
    <!-- order and payment-->
    <!-- main wrapper -->
    <div class="main-wrapper" id='order'>
        <section class="user-dashboard section">
            <div class="row justify-content-center mx-auto">
                <div class="col-sm-12 px-0">
                    <div class="row m-0 justify-content-center section-title">
                        <h2 class="m-0">سفارش <span>شما</span> </h2>
                    </div>
                </div>
                <div class="row pl-3 w-100">
                    <div class="col-md-4 order-2 order-md-1 mt-5">
                        {{-- address and user details --}}
                        <form action="{{ route('payment.attemp_payment') }}" method="POST" class="row border border-warning rounded">
                            @csrf
                            <div class="col-12">
                                <h4 class="text-center mt-3">آدرس</h4>
                            </div>
                            {{-- guest form --}}
                            @guest
                                <div class="col-md-11 col-lg-10 mx-auto mt-10">
                                    <input type="text" dusk="name" name="name" placeholder="نام"
                                        class=" w-100 text-right @error('name') border-danger @enderror">
                                    @error('name')
                                        <div class=" text-danger">
                                            لطفا اطلاعات نام را با حروف فارسی وارد کنید
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                    <input type="text" name="email" dusk="email" placeholder="ایمیل"
                                        class="w-100 text-right @error('email') border-danger @enderror">
                                    @error('email')
                                        <div class=" text-danger">
                                            لطفا ساختار ایمیل را به درستی وارد کنید
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                    <textarea name="address" rows="3" cols="25" dusk="address" maxlength="512"
                                        placeholder="ادرس" class=" w-100 text-right @error('address') border-danger @enderror"></textarea>
                                    @error('address')
                                        <div class=" text-danger">
                                            لطفا ساختار ادرس را به درستی وارد کنید
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                    <span class="w-100">: هزینه حمل</span>
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                    <select name="delivery_price" id="delivery_price"
                                        class=" w-100 text-right @error('delivery_price') border-danger @enderror">
                                        @if (Session::has('cart'))
                                            <option default value="{{ Session::get('cart')->delivery_price }}" class="text-right"> 25
                                            </option>
                                            <option value="0" class="text-right">جداگانه پرداخت میکنم</option>
                                        @endif
                                    </select>
                                    @error('delivery_price')
                                        <div class=" text-danger">
                                            مبلغ هزینه حمل اشتباه است
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                    <span class="w-100">: جمع سفارش </span>
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                    <input type="text" class="w-100" disabled name="total_price" id="total_price" value="">
                                </div>
                                <div class="col-md-11 col-lg-10 mt-1 mx-auto mt-1 mb-3">
                                    <div class="row">
                                        <button type="submit" class="mx-auto" id='guest_payment_btn' dusk="guest_payment_btn">پرداخت</button>
                                    </div>
                                </div>
                            @endguest
                        
                            {{-- user form --}}
                            @auth
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                        <input type="text" name="name" class="w-100 text-right"disabled placeholder="نام"
                                            value="{{ auth()->user()->name }}">
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                    <input type="text" class="w-100 text-right" name="email" disabled placeholder="ایمیل"
                                    value="{{ auth()->user()->email }}">
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                    <textarea name="address" rows="3" cols="25" maxlength="512" placeholder="ادرس جدید"
                                        class=" w-100 text-right @error('address') border-danger @enderror"
                                        value="">{{ auth()->user()->address }}</textarea>
                                    @error('address')
                                        <div class=" text-danger">
                                            *
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                    <span class="w-100">: هزینه حمل</span>
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1">
                                    <select name="delivery_price" id="delivery_price"
                                        class="w-100 text-right @error('delivery_price') border-danger @enderror">
                                        @if (Session::has('cart'))
                                            <option default value="{{ Session::get('cart')->delivery_price }}">۲۵۰۰۰ تومان
                                            </option>
                                            <option value="0">جداگانه پرداخت میکنم</option>
                                        @endif
                                    </select>
                                    @error('delivery_price')
                                        <div class=" text-danger">
                                            *
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                    <span class="w-100">: جمع سفارش </span>
                                </div>
                                <div class="col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                    <input type="text" class="w-100" disabled name="total_price" id="total_price" value="">
                                </div>
                                <div class="col-md-11 col-lg-10 mt-1 mx-auto mt-1 mb-3">
                                    <div class="row ">
                                        <button type="submit" class="mx-auto" dusk="user_payment_btn" id='user_payment_btn' >پرداخت</button>
                                    </div>
                                </div>
                            @endauth
                        </form>
                    </div>
                    <div class="col-md-8 order-1 order-md-2 px-sm-3 px-0">
                        <div class="block text-center border border-warning rounded mt-5 px-3 py-0">
                            <div class="row">
                                {{-- order details --}}
                                <div class="col-12 px-sm-3 px-0">
                                    <div class="block">
                                        <div class="product-list">
                                            <div class="">
                                                <table class="table cart-table">
                                                    <thead class="border-bottom border-gray">
                                                        <tr>
                                                            <th></th>
                                                            <th>جمع</th>
                                                            <th>تعداد</th>
                                                            <th>قیمت</th>
                                                            <th class="text-right">نام</th>

                                                        </tr>
                                                    </thead>
                                                    {{-- items in the cart --}}
                                                    <tbody>
                                                        @if (Session::has('cart'))
                                                            @foreach (Session::get('cart')->items as $item)
                                                                <tr>
                                                                    {{-- delete icon --}}
                                                                    <td class="col-1">
                                                                        <a class="text-danger"
                                                                            dusk="product-remove-link"
                                                                            href="{{ route('cart.remove', $item['item']) }}"><p class="mt-3">X</p></a>
                                                                    </td>
                                                                    {{-- price --}}
                                                                    <td class="col-1"><p class="mt-3">{{ $item['price'] }}</p></td>
                                                                    <td class="col-1"><p class="mt-3">{{ $item['quantity'] }}</p></td>
                                                                    <td class="col-1"><p class="mt-3">{{ $item['price'] / $item['quantity'] }}</p></td>

                                                                    {{-- images and name --}}
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-sm-2">
                                                                                <img class="" style=" height:50px;width:50px; border-radius:1.25rem"
                                                                                src="{{ asset('images/menu/' . $item['item']['name_fa'] . '.jpg') }}"
                                                                                alt="product-img">
                                                                            </div>
                                                                            <div class="col-sm-10 text-sm-right my-auto">
                                                                                <a class="text-dark "
                                                                                    href="#">{{ $item['item']['name_fa'] }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td>
                                                                    <p class="text-danger">سبد شما خالی است</p>
                                                                </td>
                                                            </tr>
                                                            <hr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- optional notes --}}
                                            <li class="d-flex flex-sm-row justify-content-between flex-column border-top border-gray py-2 px-1">
                                                <div class="my-auto order-sm-1 order-2">
                                                    @if (Session::has('cart'))
                                                        @if (Session::get('cart')->notes)
                                                            <span class="text-danger">{{ Session::get('cart')->notes }}</span>
                                                            <form action="{{ route('cart.removeNotes') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" dusk="remove-notes-btn">X</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('cart.addNotes') }}" method="POST">
                                                                @csrf
                                                                <input type="text" class="text-warning border-none" name="notes"
                                                                    value="" maxlength="128" dusk="add-notes-input"
                                                                    placeholder="ندارد">
                                                                <button type="submit" dusk="add-notes-btn" class="py-1 px-3 btn btn-warning">ذخیره</button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="order-sm-2 order-1">
                                                    <span class="text-dark ml-auto"><p class="my-auto">:توضیحات </p></span>
                                                </div>
                                            </li>

                                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-between border-top border-gray py-2">
                                                @if (Session::has('cart'))
                                                    <div class="col-lg-4 col-md-6 mb-2 mb-md-0 px-1">
                                                        <a href="{{ route('cart.removeAll') }}" dusk="order_delete_whole_cart_link"
                                                            class="btn btn-danger w-100">حذف سبد خرید</a>
                                                    </div>
                                                @endif
                                                <div class="col-lg-4 col-md-6 px-1">
                                                    <a href="/#menu" class="btn btn-warning w-100">اضافه کردن موارد بیشتر</a>
                                                </div>
                                            </div>
                                            <hr>

                                            @if (Session::has('cart'))
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="list-unstyled text-right">
                                                            {{-- total price and tax --}}
                                                            <li>جمع کل<span id="cart_price"
                                                                    class="d-inline-block w-100px">{{ Session::has('cart') ? Session::get('cart')->totalPrice : '0' }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            document.getElementById("order").scrollIntoView();
        </script>
    @endsection
