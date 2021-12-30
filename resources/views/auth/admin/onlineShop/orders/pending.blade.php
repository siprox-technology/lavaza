@extends('layouts.app')
@section('content')
    <main id="pendingOrders">
       <section>
         <div class="row justify-content-center py-3 w-100 mx-auto">
            <h3 class="">سفارشات جدید</h3>
         </div>
         <div class="row justify-content-center pb-3 w-100 mx-auto">
               <a href="{{route('admin.index')}}">بازگشت به ادمین</a>
         </div>
         {{-- orders table --}}
         <div class="row mx-auto">
            <div class="col-md-12 cart_table wow fadeInUp details-box" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
               <div class="table-responsive">
                  <table class="table table-bordered" style="min-width: 800px">
                     <thead>
                           <tr class="text-right">
                              <th class="darkcolor p-1">جزییات</th>
                              <th class="darkcolor p-1">تلفن</th>                                 
                              <th class="darkcolor p-1">زمان</th>
                              <th class="darkcolor p-1">مبلغ کل</th> 
                              <th class="darkcolor p-1">شماره سفارش</th>  
                              <th class="darkcolor p-1">
                                 <input type="checkbox" name="" id="checkAllItems">
                              </th>  
                           </tr>
                     </thead>
                     <tbody>
                     <!-- update order status cancel or process -->
                     <form id="updateOrderStatusForm" action="{{route('onlineShop.orders.update')}}" method="POST">
                        @csrf
                        {{-- order details --}}
                        @foreach ($pendingOrders as $order)
                           <tr>
                              <td class="d-flex flex-column">
                                 <ul class="pl-2">
                                    @foreach ($order->order_items as $item)
                                       <li>{{$item->name_fa}} x {{$item->quantity}} = {{$item->price}}</li>
                                    @endforeach
                                    <li>هزینه حمل x 1 = {{$order->delivery_price}}</li>
                                    <li>ادرس ارسالی = </li>
                                    {{$order->delivery_address}}
                                 </ul>
                              </td>
                              <td class="p-1">
                                 <h6 class="default-color text-center">{{$order->phone}}</h6>
                              </td>
                              <td class="p-1">
                                 <h6 class="default-color text-center">{{$order->created_at}}</h6>
                              </td>
                              <td class="text-center p-1">
                                 <h6 class="default-color text-center">{{ number_format($order->total_price, 0) }}</h6>
                              </td>
                              <td class="p-1">
                                 <h6 class="default-color text-center">{{$order->id}}</h6>
                              </td>
                              <td>
                                 <input type="checkbox" name="order-numbers[]" value="{{$order->id}}" id="ordersToProcess">
                              </td>
                           </tr>
                        @endforeach
                        <input type="hidden" name="ordersStatus" value="" id="ordersStatusInput">
                        <button type="submit" id="processBtn">پردازش</button>
                        <button type="submit" id="cancelBtn">کنسل</button>
                     </form>
                  </table>
               </div>
            </div>   
         </div>
       </section>
      <script type="text/javascript">
         document.getElementById("pendingOrders").scrollIntoView();
      </script>
   </main>
@endsection