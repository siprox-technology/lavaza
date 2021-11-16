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
                <div class="row pl-3 w-100 {{(Session::has('cart'))?'':'justify-content-center'}}">
                    {{-- address --}}
                    @if(Session::has('cart'))
                        <div class="col-md-4 order-2 order-md-1 mt-5">
                            {{-- address and user details --}}
                            <form action="{{ route('payment.attemp_payment') }}" method="POST" class="row border border-warning rounded">
                                @csrf
                                <div class="col-12">
                                    <h4 class="text-center mt-3">آدرس</h4>
                                </div>
                                {{-- guest form --}}
                                @guest
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: نام</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-10">
                                        <input type="text" dusk="name" name="name" value="{{ old('name') }}"
                                            class=" w-100 text-right @error('name') border-danger @enderror">
                                        @error('name')
                                            <div class=" text-danger text-right">
                                                لطفا اطلاعات نام را با حروف فارسی وارد کنید
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: موبایل</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                        <input type="text" name="phone" id="phone" maxlength="11" dusk="phone"
                                            class="w-100 text-right  @error('phone') border-danger @enderror"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="text-right text-danger mt-2">
                                                09** *** **** لطفا شماره را به صورت صحیح وارد کنید 
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: ادرس</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                        <textarea name="address" rows="3" cols="25" dusk="address" maxlength="512"  value="{{ old('address') }}"
                                             class=" w-100 text-right @error('address') border-danger @enderror"></textarea>
                                        @error('address')
                                            <div class=" text-danger text-right">
                                                لطفا ساختار ادرس را به درستی وارد کنید
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: هزینه حمل</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                        <select name="delivery_price" id="delivery_price"
                                            class=" w-100 text-right @error('delivery_price') border-danger @enderror form-select">
                                            @if (Session::has('cart'))
                                            <option default value="{{Session::get('cart')->delivery_price}}">
                                                {{ number_format(Session::get('cart')->delivery_price,0)}}
                                            </option>
                                                <option value="0" class="text-right">جداگانه پرداخت میکنم</option>
                                            @else
                                                <option default value="0" class="text-right"></option>
                                            @endif
                                        </select>
                                        @error('delivery_price')
                                            <div class=" text-danger">
                                                مبلغ هزینه حمل اشتباه است
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-5 p-3 text-center border border-warning rounded">
                                        <span class="w-100"><h5>: جمع سفارش </h5></span>
                                        <input type="hidden" class="w-100 text-right " disabled name="total_price" id="total_price" value="">
                                       <div class="row w-100 mx-auto justify-content-between">
                                            <h3>تومان</h3>
                                            <h3 id="display_total_price"></h3>
                                       </div>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mt-2 mx-auto mb-3">
                                        <div class="row">
                                            <button type="submit" class="mx-auto" id='guest_payment_btn' dusk="guest_payment_btn">پرداخت</button>
                                        </div>
                                    </div>
                                @endguest
                            
                                {{-- user form --}}
                                @auth
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: نام</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                            <input type="text" name="name" class="w-100 text-right" 
                                                value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: موبایل</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                        <input type="text" name="phone" id="phone" maxlength="11" dusk="phone"
                                            class="w-100 text-right  @error('phone') border-danger @enderror"
                                            value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <div class="text-right text-danger mt-2">
                                                09** *** **** لطفا شماره را به صورت صحیح وارد کنید 
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: ادرس</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                        <textarea name="address" rows="3" cols="25" maxlength="512" placeholder="ادرس جدید"
                                            class=" w-100 text-right @error('address') border-danger @enderror"
                                            value="">{{ auth()->user()->address }}</textarea>
                                        @error('address')
                                            <div class=" text-danger">
                                                لطفا ساختار ادرس را به درستی وارد کنید
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1 text-right">
                                        <span class="w-100">: هزینه حمل</span>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-1">
                                        <select name="delivery_price" id="delivery_price"
                                            class="w-100 text-right @error('delivery_price') border-danger @enderror form-select">
                                            @if (Session::has('cart'))
                                                <option default value="{{Session::get('cart')->delivery_price}}">
                                                    {{ number_format(Session::get('cart')->delivery_price,0)}}
                                                </option>
                                                <option value="0">جداگانه پرداخت میکنم</option>
                                            @endif
                                        </select>
                                        @error('delivery_price')
                                            <div class=" text-danger">
                                                مبلغ هزینه حمل اشتباه است
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mx-auto mt-5 p-3 text-center border border-warning rounded">
                                        <span class="w-100"><h5>: جمع سفارش </h5></span>
                                        <input type="hidden" class="w-100 text-right " disabled name="total_price" id="total_price" value="">
                                       <div class="row w-100 mx-auto justify-content-between">
                                            <h3>تومان</h3>
                                            <h3 id="display_total_price"></h3>
                                       </div>
                                    </div>
                                    <div class="col-sm-8 col-md-11 col-lg-10 mt-2 mx-auto mb-3">
                                        <div class="row">
                                            <button type="submit" class="mx-auto" id='user_payment_btn' dusk="user_payment_btn">پرداخت</button>
                                        </div>
                                    </div>
                                @endauth
                            </form>
                        </div>
                    @endif
                    {{-- order-details --}}
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
                                                                    <td class="col-1"><p class="mt-3">{{number_format($item['price'],0)  }}</p></td>
                                                                    <td class="col-1"><p class="mt-3">{{ $item['quantity'] }}</p></td>
                                                                    <td class="col-1"><p class="mt-3">{{number_format($item['price'] / $item['quantity'],0)}}</p></td>

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
                                                                <button type="submit" class="py-1 px-3" dusk="remove-notes-btn">X</button>
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

                                            <div class="d-flex flex-column flex-md-row align-items-center {{(Session::has('cart'))?'justify-content-md-between':'justify-content-center'}} border-top border-gray py-2">
                                                @if (Session::has('cart'))
                                                    <div class="col-lg-4 col-md-6 mb-2 mb-md-0 px-1">
                                                        <a href="{{ route('cart.removeAll') }}" dusk="order_delete_whole_cart_link"
                                                            class="btn btn-danger w-100">حذف سبد خرید</a>
                                                    </div>
                                                @endif
                                                <div class="col-lg-4 col-md-6 px-1">
                                                    <a href="/#menu" class="btn btn-warning w-100">{{(Session::has('cart'))?'اضافه کردن موارد بیشتر':'سفارش غذا'}}</a>
                                                </div>
                                            </div>
                                            @if (Session::has('cart'))
                                                <div class="">
                                                    {{-- total price and tax --}}
                                                    <input type="hidden" id="cart_price_input" value="{{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}}">
                                                </div>
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
    </div>
        <script type="text/javascript">
            document.getElementById("order").scrollIntoView();
        </script>
@endsection
