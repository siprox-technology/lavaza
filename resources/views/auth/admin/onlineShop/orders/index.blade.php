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
         {{-- sort orders --}}
         <div class="row justify-content-center pb-3 w-100 mx-auto">
            <form>
               <input type="radio" id="pending" name="orderStatus" value="pending" checked="checked">
               <label for="pending">جدید</label><br>
               <input type="radio" id="processed" name="orderStatus" value="processed">
               <label for="processed">پردازش شده</label><br>
               <input type="radio" id="canceled" name="orderStatus" value="canceled">
               <label for="canceled">کنسلی</label>
               <input type="radio" id="all" name="orderStatus" value="all">
               <label for="all">همه</label>
             </form>

         </div>
            {{-- orders --}}
            <div class="row" id="orderDetails">

               {{-- form here to change order status??? --}}
            <input type="hidden" name="ordersStatus" value="" id="ordersStatusInput">
            <div class="col-12">
               <button type="submit" id="processBtn">پردازش</button>
               <button type="submit" id="cancelBtn">کنسل</button>
               <input type="checkbox" name="" id="checkAllItems">
            </div>
            </div>

       </section>

       <button id="getOrdersData">Pending</button>
         <p id="testResult"></p>
      <script type="text/javascript">
         document.getElementById("orders").scrollIntoView();
      </script>
   </main>
@endsection