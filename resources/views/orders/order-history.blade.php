@extends('layouts.app')

@section('content')

    <!-- order history-->
    <section id="order-history-section" class=" row justify-content-center bglight position-relative padding noshadow">
        <div class="col-lg-5 col-md-7 col-sm-9">
            <div class="row justify-content-center">
                <a class="" href=" user-profile.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Order</span>
                    history
                    <span class="divider-center"></span>
                </h2>
            </div>
            @foreach ($orders as $order)
                <div class="border border-warning rounded">
                    <div class="mb-0 row px-3">
                        <p class="mr-auto text-warning">{{$order->total_price}}</p>
                        <p class="ml-auto">: جمع سفارش</p>
                    </div>
                    <div class="mb-0 row px-3">
                        <p class="mr-auto text-warning">{{$order->created_at}}</p>
                        <p class="ml-auto">: تاریخ سفارش</p>
                    </div>
                </div>
                    <div class="row mx-auto w-100 justify-content-center my-3">
                        <button class="btn btn-warning" dusk="order_details" type="button" data-toggle="collapse"
                            data-target="#order-details-{{ $order->id }}" aria-expanded="false"
                            aria-controls="collapseExample">
                            جزییات سفارش
                        </button>
                        <form action="{{ route('dashboard.orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $order->id }}" name="id">
                            <button type="submit" class="btn btn-dark" dusk="{{($order->total_price == '58.75')?'order_again':''}}">سفارش مجدد</button>
                        </form>    
                    </div>
                    <div class="collapse mb-3" id="order-details-{{ $order->id }}">
                        <div class="card card-body">
                            <div class="p-3 border rounded border-warning ">
                                <h4 class="mb-4 text-center">جزییات سفارش</h4>
                                <ul class="pl-0 mb-3">
                                    @foreach ($order->order_items as $item)
                                        <li class="d-flex p-3 mb-2 border border-warning rounded">
                                            <img class="" style=" width:50px; height:50px; border-radius: 1.1rem"
                                            src="{{ asset('images/menu/' . $item->name_fa . '.jpg') }}"
                                            alt="product-img" >
        
                                            <div class="mx-3 ml-auto text-right">
                                                {{-- item quantity --}}
                                                <p class="mb-0 text-warning">{{ $item->name_fa }}</p>
                                                <span class="">تعداد :</span>
                                                <span class="">{{ $item->quantity }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="text-center text-white row justify-content-between px-3">
                           
                                 </div>

                            </div>                                             
                        </div>
                    </div>
            @endforeach
        </div>
    </section>

    <script type="text/javascript">
        document.getElementById("order-history-section").scrollIntoView();
    </script>
@endsection
