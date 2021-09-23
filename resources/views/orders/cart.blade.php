@extends('layouts.app')

@section('content')
    <!-- shopping basket-->
    <!-- main wrapper -->
    <div class="main-wrapper" id='cart'>
        <section class="user-dashboard section">
            <div class="row justify-content-center px-lg-5 px-md-4 p-3">
                <div class="col-md-10">
                    <div class="row m-0 w-100 justify-content-center">
                        <h2 class="m-0">سبد خرید</h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="block text-center border border-grey mt-5 p-3">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="block">
                                    <div class="product-list">
                                        <div class="table-responsive">
                                            <table class="table cart-table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>نام</th>
                                                        <th>قیمت</th>
                                                        <th>تعداد</th>
                                                        <th>جمع</th>
                                                    </tr>
                                                </thead>
                                                {{-- items in the cart --}}
                                                <tbody>
                                                    @if (Session::has('cart'))
                                                        @foreach (Session::get('cart')->items as $item)
                                                            <tr>
                                                                {{-- delete icon --}}
                                                                <td>
                                                                    <a class="product-remove text-danger"
                                                                        dusk="product-remove-link"
                                                                        href="{{ route('cart.remove', $item['item']) }}">X</a>
                                                                </td>
                                                                {{-- images and name --}}
                                                                <td>
                                                                    <div class="row">
                                                                        <img class="" style=" height:75px;width:75px;"
                                                                            src="{{ asset('images/menu/' . $item['item']['name'] . '.jpg') }}"
                                                                            alt="product-img">
                                                                        <div class="col-10 text-left">
                                                                            <a class="text-dark"
                                                                                href="#">{{ $item['item']['name_fa'] }}</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                {{-- price --}}
                                                                <td>{{ $item['price'] / $item['quantity'] }}</td>
                                                                <td>{{ $item['quantity'] }}</td>
                                                                <td>{{ $item['price'] }}</td>
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
                                        <hr>
                                        <div
                                            class="d-flex flex-column flex-md-row align-items-center justify-content-md-between ">
                                            @if (Session::has('cart'))
                                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                                    <a href="{{ route('cart.removeAll') }}" dusk="delete_whole_cart_link"
                                                        class="btn btn-danger w-100">حذف سبد خرید</a>
                                                </div>
                                            @endif
                                            <div class="col-lg-4 col-md-6 col-12 ">
                                                <a href="/#menu" class="btn btn-dark w-100">اضافه کردن موارد بیشتر</a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12 ">
                                                <a href="/order#order" dusk="submit-order-btn"
                                                    class="btn btn-dark w-100">تایید سفارش</a>
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- optional notes --}}
                                        <li class="d-flex border-bottom">
                                            @if (Session::has('cart'))
                                                <span class="text-dark">توضیح بیشتر راجع به سفارش:</span>
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
                                                        <button type="submit" dusk="add-notes-btn">ذخیره</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </li>
                                        @if (Session::has('cart'))
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="list-unstyled text-right">
                                                        {{-- total price and tax --}}
                                                        <li>جمع کل<span
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
        </section>
        <script type="text/javascript">
            document.getElementById("cart").scrollIntoView();
        </script>
    @endsection
