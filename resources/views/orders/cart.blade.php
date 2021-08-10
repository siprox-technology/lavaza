@extends('layouts.app')

@section('content')
        <!-- shopping basket-->
        <!-- main wrapper -->
        <div class="main-wrapper">
            <section class="user-dashboard section">
                    <div class="row justify-content-center px-lg-5 px-md-4 p-3">
                        <div class="col-md-10">
                            <div class="row m-0 w-100 justify-content-center">
                                <h2 class="m-0">Shopping basket</h2>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="block text-center border border-grey mt-5 p-3">
                                <div class="row">
                                    <div class="col-12 mx-auto">
                                        <div class="block">
                                            <div class="product-list">
                                                <form method="#">
                                                    <div class="table-responsive">
                                                        <table class="table cart-table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Product Name</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Sub Total</th>
                                                                </tr>
                                                            </thead>
                                                            {{-- items in the cart  --}}
                                                            <tbody>
                                                                @if (Session::has('cart'))
                                                                    @foreach (Session::get('cart')->items as $item)
                                                                    <tr>
                                                                        {{-- delete icon --}}
                                                                        <td>
                                                                            <a class="product-remove text-danger" href="{{route('cart.remove',$item['item'])}}">X</a>
                                                                        </td>
                                                                        {{-- images and name --}}
                                                                        <td>
                                                                            <div class="row">
                                                                                    <img class="" style="height:75px;width:75px;"
                                                                                    src="{{asset('images/product-images/'.$item['item']['model_number'].'/'.$item['item']['model_number'].'-0.jpg')}}"
                                                                                    alt="product-img">
                                                                                <div class="col-10 text-left">
                                                                                    <a class="text-dark" href="{{route('shop.product_details.index',$item['item']['model_number'])}}">{{$item['item']['name']}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        {{-- price --}}
                                                                        <td>${{($item['price'])/($item['quantity'])}}</td>
                                                                        <td>{{$item['quantity']}}</td>
                                                                        <td>${{$item['price']}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                @else
                                                                <tr>
                                                                    <td>
                                                                        <p class="text-danger">Shopping cart empty !</p>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-between ">
                                                        @if (Session::has('cart'))
                                                            <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                                                <a href="{{route('cart.removeAll')}}" class="btn btn-danger w-100">Delete Cart</a>
                                                            </div>
                                                        @endif
                                                        <div class="col-lg-4 col-md-6 col-12 ">
{{--                                                             <a href="{{route('shop.index')}}" class="btn btn-dark w-100">Continue shopping</a>
 --}}                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @if (Session::has('cart'))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <ul class="list-unstyled text-right">
                                                                    {{-- total price and tax  --}}
                                                                    <li>Sub Total <span
                                                                            class="d-inline-block w-100px">${{(Session::has('cart'))?Session::get('cart')->totalPrice:'0'}}</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <hr>
{{--                                                         <a href="{{route('checkout.index')}}"
                                                            class="btn btn-primary float-right">Checkout</a> --}}
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
@endsection