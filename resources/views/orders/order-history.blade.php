@extends('layouts.app')

@section('content')

        <!-- order history-->
        <section id="order-history-section" class="bglight position-relative padding noshadow">
            <div class="container whitebox">
            <div class="row justify-content-center">
                <a class="" href="user-profile.php"><i class="fas fa-arrow-left"></i></a>
            </div>
                <div class="row justify-content-center">
                    <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Order</span>
                        history
                        <span class="divider-center"></span>
                    </h2>
                </div>
                @foreach ($orders as $order)
                <div class="row">
                    <div class="row">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#order-details-{{$order->id}}" aria-expanded="false" aria-controls="collapseExample">
                            جزییات سفارش
                        </button>
                        <ul>
                            <li>تاریخ:</li>
                            <li>{{$order->created_at}}</li>
                            <li>مبلغ کل:</li>
                            <li>{{$order->total_price}}</li>
                            <li>هزینه حمل:</li>
                            <li>{{$order->delivery_price}}</li>
                        </ul>
                    </div>
                      <div class="collapse" id="order-details-{{$order->id}}">
                        <div class="card card-body">
                            <ul>
                                @foreach ($order->order_items as $item)
                                    <li class="d-flex border-bottom">
                                        <img class="" style="width:50px; height:50px;" src="{{asset('images/menu/'.$item->name.'.jpg')}}" alt="product-img">
                                        <div class="mx-3">
                                            <p class="mb-0 text-dark">{{$item->name_fa}}</p>
                                            <span class="text-dark">{{$item->quantity}}</span> 
                                            <span class="text-dark">X</span> 
                                            <span class="text-dark">{{$item->price}}</span>
                                            <span class="text-dark">{{($item->price)*($item->quantity)}}</span>
                                        </div>
                                    </li>
                                @endforeach
                                <li>
                                    جمع: {{($order->total_price)-($order->delivery_price)}}
                                </li>
                                <li>
                                    <form action="{{route('dashboard.orders.store')}}" method="POST">
                                        @csrf
                                        {{-- order id --}}
                                        <input type="hidden" value="{{$order->id}}" name="id">
                                        <button type="submit">سفارش مجدد</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                      </div>
                </div>
                @endforeach


                <p class="text-danger m-0">*Full payment for pending orders must be completed within 24 hours.</p>
                <p class="text-danger m-0">*Pending orders will be removed from this list after 24 hours.</p>
            </div>
        </section>

            <script type="text/javascript">
                document.getElementById("order-history-section").scrollIntoView();
            </script>
@endsection

