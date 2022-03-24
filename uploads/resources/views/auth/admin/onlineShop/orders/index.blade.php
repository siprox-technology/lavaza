@extends('layouts.app')
@section('content')
    <main id="orders">
       <section>
         <div class="row justify-content-center py-3 w-100 mx-auto">
            <h3 class="">سفارشات ۲۴ ساعت گذشته</h3>
         </div>
         <div class="row justify-content-center pb-3 w-100 mx-auto">
               <a href="{{route('onlineShop.index')}}">بازگشت به فروشگاه انلاین</a>
         </div>
         {{-- sort orders --}}
         <div class="row justify-content-center pb-3 w-100 mx-auto">
             <select name="orderStatus" id="orderStatus">
                  <option value="pending" default>سفارشات جدید</option>
                  <option value="processed" >پردازش شده</option>
                  <option value="canceled" >کنسل شده</option>
                  <option value="all" >همه</option>
             </select>
             <button id="getOrdersData">
                <i class="icofont-refresh refreshed" style="display: block"></i>
                <i class="icofont-close refreshing" style="display: none"></i>
            </button>
         </div>
            <form action="{{route('onlineShop.orders.update')}}" method="POST">
               @csrf
               <input type="hidden" name="ordersStatus" value="" id="ordersStatusInput">
               <div class="row justify-content-center pb-3 w-100 mx-auto">
                     <button type="submit" id="processBtn">پردازش</button>
                     <button type="submit" id="cancelBtn">کنسل</button>
                     <input type="checkbox" name="" id="checkAllItems">
               </div>
               {{-- orders --}}
               <div class="row justify-content-center px-1 px-sm-4 w-100 mx-auto" id="orderDetails">
               </div>
            </form>
       </section>


      <script type="text/javascript">
         document.getElementById("orders").scrollIntoView();
      </script>
   </main>
@endsection