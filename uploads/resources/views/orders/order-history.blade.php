@extends('layouts.app')

@section('content')

    <!-- order history-->
    <section id="order-history-section"
        class=" row justify-content-center w-100 mx-auto bglight position-relative padding noshadow">
        <div class="col-lg-5 col-md-7 col-sm-9">
            <div class="row justify-content-center">
                <a class="" href=" user-profile.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">قبلی</span>
                    سفارشات
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="row justify-content-center pb-3 w-100 mx-auto">
                <a href="{{ route('dashboard.index') }}">بازگشت به منوی اصلی</a>
            </div>
            @if (count($orders) == 0)
                <div class="text-center">
                    <h6 class="text-danger">! سفارشی موجود نیست</h6>
                </div>

            @else
                @foreach ($orders as $order)
                    <div class="p-3 border border-dark rounded mb-3">
                        <div class="px-3 text-center">
                            <h5>سفارش شماره : {{ $order->id }}</h5>
                        </div>
                        <div class="row mx-auto w-100 justify-content-center my-3">
                            <button class="btn btn-warning mr-1 px-3 py-1 mb-1 mb-sm-0" dusk="order_details" type="button"
                                data-toggle="collapse" data-target="#order-details-{{ $order->id }}"
                                aria-expanded="false">
                                جزییات سفارش
                            </button>
                            <form action="{{ route('dashboard.orders.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $order->id }}" name="id">
                                <button type="submit" class="btn px-3 py-1"
                                    dusk="{{ $order->total_price == '124750' ? 'order_again' : '' }}">سفارش مجدد</button>
                            </form>
                        </div>
                        <div class="collapse" id="order-details-{{ $order->id }}">
                            <h4 class="mb-4 text-center">جزییات سفارش</h4>
                            <ul class="pl-0 mb-3">
                                @foreach ($order->order_items as $item)
                                    <li class="d-flex pt-3 px-3 mb-2 border border-warning rounded">
                                        <img class="" style=" width:50px; height:50px; border-radius: 1.1rem"
                                            src="{{ asset('images/menu/' . $item->name_fa . '.jpg') }}" alt="product-img">
                                        <div class="mx-3 ml-auto text-right d-flex flex-column">
                                            {{-- item quantity --}}
                                            <div class="row justify-content-end">
                                                <p class="mb-0 text-warning text-right">{{ $item->name_fa }}</p>
                                            </div>
                                            <div class="row justify-content-center">
                                                <span class="ml-auto">{{ $item->quantity }}</span>
                                                <span class=" ml-auto">: تعداد</span>
                                            </div>
                                            <div class="row justify-content-around">
                                                <p class="mr-1">تومان</p>
                                                <span class="ml-auto mr-1">{{ number_format($item->price, 0) }}</span>
                                                <span class="ml-auto">: قیمت</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="border border-warning rounded p-2">
                            <div class="mb-0 row px-3 w-100 mx-auto">
                                <p class="mb-0 mr-auto">{{ $order->created_at->format('Y-m-d') }}</p>
                                <p class="mb-0 ml-auto">: تاریخ سفارش</p>
                            </div>
                            <div class="mb-0 row px-3 w-100 mx-auto" style="max-height: 24px">
                                <p class="mr-1 mb-0"><b>تومان</b></p>
                                <p class="mr-auto mb-0"><b> {{ number_format($order->total_price, 0) }}</b></p>
                                <p class="ml-auto">: جمع سفارش</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <script type="text/javascript">
        document.getElementById("order-history-section").scrollIntoView();
    </script>
@endsection
