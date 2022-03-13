<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @if (session('ignoreCache'))
        <!-- ======= No Cache ======= -->
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    @endif

    <title> لاواتزا - طعمی متفاوت از برگر</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- order history-->
    <section id="orders-to-print" class="">
         <div class="row mx-auto">
            @foreach ($orders as $order)
                <div class="col-4 col-lg-2 col-md-3 col-sm-4 px-2 py-1 border rounded mr-1 mt-1">
                    <div class="row justify-content-center">
                        <p class="text-center text-dark mr-2 mb-1">{{$order->id}}</p>
                        <p class="text-center mb-1"><b> : شماره سفارش</b></p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="text-center text-dark mb-1 mr-2">{{$order->created_at}}</p>
                        <p class="text-center mb-1"><b> : زمان سفارش</b></p>
                    </div>
                    <div class="border mt-0 mb-2"></div>
                    <ul class="p-0 text-right list-unstyled menu">
                        @foreach ($order->order_items as $item)
                            <div class="menu-content mt-0">
                                <span class="p-0">{{$item->price}}</span>
                                <p class="p-0 mb-1 text-dark" style="font-weight:400">{{$item->name_fa}}
                                <span class="p-0 pl-2" style="font-weight:400"><b> تعداد : </b></span>
                                <span class="pr-0 text-dark" style="font-weight:400">{{$item->quantity}}</span>
                                </p>
                            </div>
                        @endforeach
                        <div class="menu-content mt-0"><span class="p-0">{{$order->delivery_price}}</span>
                            <p class="p-0 mb-1 text-dark" style="font-weight:400">هزینه حمل </p>
                        </div>
                    </ul>
                    <div class="row justify-content-center"><p class="text-center text-dark mb-1 mr-2">{{$order->total_price}}</p>
                        <p class="text-center mb-1"><b> : مبلغ کل</b></p>
                    </div>
                    <div class="border mt-0 mb-2"></div>
                    <p class="text-right mb-1">
                        <span class="text-dark"><b> ادرس : </b></span>{{$order->delivery_address}}</p>
                        <p class="text-right"><span class="text-dark"><b> شماره تماس : </b></span>{{$order->phone}}</p>
                </div>
            @endforeach
         </div>
    </section>

    <script type="text/javascript">
        document.getElementById("orders-to-print").scrollIntoView();
    </script>
</body>