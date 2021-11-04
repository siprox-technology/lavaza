@extends('layouts.app')

@section('content')
    <!-- order and payment-->
    <!-- main wrapper -->
    <div class="main-wrapper" id='order-confirm'>
    {{-- payment confirmation  --}}
        <div class="row w-100 mt-5 mx-auto justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 text-center border border-warning rounded p-3">
                <h5 class="mt-2 text-success">{{$_GET['payment_data']['message']}}</h5>
                <br>
                <div class="col-12">
                    <span><b>: مبلغ</b></span>
                    <div class="row w-100 mx-auto justify-content-center">
                        <h3 class="mr-2"> تومان</h3>
                        <h3 class="mb-1 mt-1">{{number_format($_GET['payment_data']['amount'],0)}}</h3>
                    </div>
                </div>
                <div class="col-12">
                    <span><b>: شماره سفارش</b></span>
                    <div class="row w-100 mx-auto justify-content-center">
                        <h6 class="mt-2">{{$_GET['order_id']}}</h6>
                    </div>
                </div>

                <div class="col-12">
                    <span><b>: شماره پیگیری</b></span>
                    <div class="row w-100 mx-auto justify-content-center">
                        <h6 class="mt-2">{{$_GET['payment_data']['payment_ref']}}</h6>
                    </div>
                </div>

                <div class="col-12">
                    <span><b>: تاریخ پرداخت</b></span>
                    <div class="row w-100 mx-auto justify-content-center">
                        <h6 class="mt-2">{{$_GET['payment_data']['date_time']}}</h6>
                    </div>
                </div>

            </div>
        </div>

        <div class="row w-100 my-4 mx-auto justify-content-center">
            {{-- links to view cart --}}
            <a class="btn btn-warning mr-2" href="{{ route('home','#menu') }}">مشاهده منو</a>
            {{-- links to order history --}}
            @auth
                <a class="btn btn-warning " dusk="order_history" href="{{ route('dashboard.order-history.index') }}">سابقه سفارشات</a>
            @endauth
        </div>

</div>
<script type="text/javascript">
    document.getElementById("order-confirm").scrollIntoView();
</script>
@endsection
