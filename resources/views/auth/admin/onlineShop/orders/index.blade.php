@extends('layouts.app')
@section('content')
    <!--PreLoader-->
    <div class="loader" style="display:none">
      <div class="loader-inner">
          <div class="cssload-loader"></div>
      </div>
  </div>
  <!--PreLoader Ends-->
    <main id="orders">
       <section>
         <div class="row justify-content-center py-3 w-100 mx-auto">
            <h3 class="">سفارشات</h3>
         </div>
         <div class="row justify-content-center pb-3 w-100 mx-auto">
               <a href="{{route('onlineShop.index')}}">بازگشت به فروشگاه انلاین</a>
         </div>
            {{-- orders --}}
            @foreach ($orders as $order)
               <div class="col-7 col-lg-4 col-md-5 col-sm-6 p-3 border-warning rounded ">
                  <input type="checkbox" name="order-numbers[]" value="{{$order->id}}" id="ordersToProcess">
                  <p class="text-center mt-1 mb-0">
                     شماره سفارش
                  </p>
                  <p class="text-center text-warning">{{$order->id}}</p>
                  <p class="text-center mb-0">
                     مبلغ
                  </p>
                  <p class="text-center text-warning">{{ number_format($order->total_price, 0) }}</p>
                  <p class="text-center mb-0">
                     زمان سفارش
                  </p>
                  <p class="text-center text-warning mb-1">{{$order->created_at}}</p>
                  <div class="border mt-0 mb-2"></div>
                  {{-- details --}}
                  <ul class="p-0 text-right list-unstyled menu">
                     @foreach ($order->order_items as $item)
                     <div class="menu-content mt-0">
                        <span class="p-0">
                           {{$item->price}}
                        </span>
                        <p class="p-0 mb-1">{{$item->name_fa}} <span class="p-0">X</span><span class="pr-0">{{$item->quantity}}</span></p>
                     </div>
                     @endforeach
                     <div class="menu-content mt-0">
                        <span class="p-0">
                           {{$order->delivery_price}}
                        </span>
                        <p class="p-0 mb-1">هزینه حمل :  <span class="p-0">X</span><span class="pr-0">1</span></p>
                     </div>
                  </ul>
                  {{-- address and phone --}}
                  <div class="border mt-0 mb-2"></div>
                  <p class="text-right mb-1"><span class="text-dark"><b> ادرس : </b></span>{{$order->delivery_address}}
                  </p>
                  <p class="text-right"><span class="text-dark">شماره<b> تماس : </b></span>{{$order->phone}}</p>
               </div>
            @endforeach
            <input type="hidden" name="ordersStatus" value="" id="ordersStatusInput">
            <div class="col-12">
               <button type="submit" id="processBtn">پردازش</button>
               <button type="submit" id="cancelBtn">کنسل</button>
               <input type="checkbox" name="" id="checkAllItems">
            </div>
       </section>

       <button id="getOrdersData">Pending</button>
         <p id="testResult"></p>
      <script type="text/javascript">
         document.getElementById("orders").scrollIntoView();
      </script>
   </main>
@endsection